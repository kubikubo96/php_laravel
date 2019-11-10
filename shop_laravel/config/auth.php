<?php

return [

    /*
    |---------------- ----------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    /**
     * Trong Laravel, thường hay dùng session guard hoặc token guard.
     *
     * Session guard duy trì trạng thái người dùng trong mỗi lần request bằng cookie.
     * Còn Token guard xác thực người dùng bằng cách kiểm tra token hợp lệ trong mỗi lần request.
     *
     * Token là chữ ký số hay chữ ký điện tử được mã hóa thành những con số trên thiết bị chuyên biệt.
     *  Token đóng vai trò đại diện cho một cá nhân, tổ chức là căn cứ để xác minh đó là mình
     */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
        //start : tự gõ
        'admin'=>[
            'driver' =>'session',
            'provider' =>'admins'
        ],
        'admin-api' =>[
            'driver' =>'token',
            'provider' => 'admins'
        ]
        //end : tự gõ
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    /**
     * Providers lấy ra dữ liệu người dùng từ phía back-end.
     * Nếu guard yêu cầu người dùng phải hợp lệ với bộ lưu trữ
     * ở back-end thì việc triển khai truy suất người dùng sẽ được providers thực hiện.
     */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
//        start : tự viết
        'admins' => [
            'driver' =>'eloquent',
            'model' => App\Model\AdminModel::class,
        ]
//        end : tự viết

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
//        start : tự viết
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 15,
        ],
//        end : tự viết
    ],

];
