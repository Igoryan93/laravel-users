<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class Validate extends Model
{
    public static function check($request, $rules) {
//        if(count($request->all()) > 3) {
//            $rules = [
//                'email' => 'required|unique:users|max:30|min:5|email',
//                'name' => 'required|min:3|max:30',
//                'password' => 'required|min:5',
//                'password_again' => 'required|same:password',
//                'check' => 'required'
//            ];
//        } else {
//            $rules = [
//                'email' => 'required|max:30|min:5|email',
//                'password' => 'required',
//            ];
//        }


        $messages = [
            'required'    => 'Поле :attribute обязательно для заполнения',
            'same' => 'Поле :attribute и :other не совпадают.',
            'email' => 'Поле :attribute должно быть в формате example@gmail.com',
            'min'   => 'Поле :attribute должно иметь минимум :min символа',
            'max'   => 'Поле :attribute не должно превышать :max символа',
            'unique' => 'Пользователь с таким :attribute уже занят',
            'check.required' => 'Пункт соглашения с :attribute обязателен'
        ];
        $renameinput = [
            'email' => 'E-mail',
            'name' => 'Имя',
            'password' => 'Пароль',
            'password_again' => 'Повторите пароль',
            'password_new' => 'Новый пароль',
            'check' => 'правилами'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->setAttributeNames($renameinput);

        return $validator;

    }
}
