<?
use Project\Controllers\HomeController;
use Project\Controllers\RaspisanieController;
use Project\Controllers\ReviewController;
use Project\Controllers\SectionController;
use Project\Controllers\UserController;

return[
    '~^$~'=>[HomeController::class, 'renderHome'],
    '~^timetable$~'=>[RaspisanieController::class, 'renderRaspisanie'],
    '~^contacts$~'=>[RaspisanieController::class, 'renderContacts'],
    '~^feedback$~'=>[ReviewController::class, 'renderReview'],
    '~^posts/add$~'=>[ReviewController::class, 'add'],
    '~^admin/add$~'=>[UserController::class, 'add'],
    '~^post/add/(.+)$~'=>[SectionController::class, 'add'],
    '~^sections$~'=>[SectionController::class, 'section'],
    '~^admin/update$~'=>[SectionController::class, 'update'],
    '~^admin/delete$~'=>[SectionController::class, 'delete'],
    '~^redsect/(\d+)$~'=>[SectionController::class, 'redsect'],
    '~^login$~'=>[UserController::class, 'user'],
    '~^login/reg$~'=>[UserController::class, 'reg'],
    '~^login/auth$~'=>[UserController::class, 'auth'],
    '~^login/logout$~'=>[UserController::class, 'logout'],
    '~^redact/(\d+)$~'=>[UserController::class, 'view'],
    '~^posts/update$~'=>[UserController::class, 'update'],
    '~^posts/delete$~'=>[UserController::class, 'delete']
];