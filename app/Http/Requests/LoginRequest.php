<?php

namespace App\Http\Requests;

use App\Models\Merchandiser;
use App\Models\BaStaff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class LoginRequest extends FormRequest
{
    const Merchandiser = "merchandiser";
    const BaStaff = "bastaff";
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => ['string','required'],
            'password' => ['string', 'min:8', 'required'],
            'status' => ['required', 'in:merchandiser,bastaff']
        ];
    }

    public function authenticate(): Model
    {
        switch ($this->status) {
            case self::Merchandiser:
                return $this->merchandiserAuthenticate();
                break;

            case self::BaStaff:
                return $this->bastaffAuthenticate();
                break;

            default:
                //throw fatal error
                break;
        }
    }

    private function merchandiserAuthenticate(): Merchandiser
    {
        $merchandiser = Merchandiser::where('mer_code',$this->code)
            ->first();

        if (!$merchandiser) {
            throw new NotFoundResourceException("Please Register First");
        }

        $this->checkPassword($merchandiser, $this->password);

        $merchandiser->tokens()->delete();

        return $merchandiser;
    }

    private function bastaffAuthenticate(): BaStaff
    {
        $bastaff = BaStaff::where('ba_code',$this->code)
            ->first();

        if (!$bastaff) {
            throw new NotFoundResourceException("Please Register First");
        }

        $this->checkPassword($bastaff, $this->password);

        $bastaff->tokens()->delete();

        return $bastaff;
    }

    private function checkPassword(Model $model, string $password): void
    {
        if (!Hash::check($password, $model->password)) {
            throw new NotFoundResourceException("Phone Number and Password was wrong !!");
        }
    }
}
