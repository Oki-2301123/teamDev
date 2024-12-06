<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppleController;
use App\Http\Controllers\BananaController;
use App\http\Controllers\CherryController;
use App\http\Controllers\DragonfruitController;
use App\http\Controllers\EggController;
use App\http\Controllers\FigController;
use App\http\Controllers\GrapeController;
use App\http\Controllers\HotdogController;
use App\http\Controllers\IcecreamController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\KiwiController;
use App\Http\Controllers\LemonController;
use App\Http\Controllers\MacaronController;
use App\Http\Controllers\NutsController;
use App\Http\Controllers\OrangeController;
use App\http\Controllers\PineappleController;
use App\Http\Controllers\QueenController;
use App\Http\Controllers\RaspberryController;
use App\Http\Controllers\StrawberryController;
use App\Http\COntrollers\TomatoController;
use App\Http\Controllers\UnicornController;
use App\Http\Controllers\VanillaController;
use App\Http\Controllers\WorldController;
use App\Http\Controllers\XenonController;
use App\Http\Controllers\YggdrasilController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\ZodiacController;

use App\Http\Controllers\ZGreen01Controller;
use App\Http\Controllers\ZGreen02Controller;
use App\Http\Controllers\ZGreen03Controller;
use App\Http\Controllers\ZNavy01Controller;
use App\Http\Controllers\ZNavy02Controller;
use App\Http\Controllers\ZNavy03Controller;
use App\Http\Controllers\ZNavy04Controller;
use App\Http\Controllers\ZNavy05Controller;

use App\Http\Controllers\_ChallengeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('apple', [AppleController::class, 'getView']);
Route::get('banana', [BananaController::class, 'getView']);
Route::get('cherry', [CherryController::class, 'getView']);
Route::get('dragonfruit', [DragonfruitController::class, 'getView'])->name('dragonfruit');
Route::get('egg', [EggController::class, 'getView'])->name('egg');
Route::get('fig', [FigController::class, 'getView'])->name('fig');
Route::get('grape', [GrapeController::class, 'eatGrape'])->name('grape.get');
Route::post('grape', [GrapeController::class, 'eatLunch'])->name('grape.post');
Route::get('hotdog', [HotdogController::class, 'getView'])->name('hotdog');
Route::post('icecream', [IcecreamController::class, 'getView'])->name('icecream');
Route::get('jam',[JamController::class, 'getView'])->name('jam');
ROute::get('kiwi',[KiwiController::class,'getForm'])->name('kiwi.get');
Route::post('kiwi', [KiwiController::class, 'createRecode'])->name('kiwi.post');
Route::get('lemon', [LemonController::class, 'getForm'])->name('lemon.get');
Route::post('lemon',[LemonController::class, 'updateRecode'])->name('lemon.post');
Route::get('macaron', [MacaronController::class,'getForm'])->name('macaron.get');
Route::post('macaron', [MacaronController::class,'deleteRecode'])->name('macaron.post');
Route::get('nuts', [NutsController::class, 'getForm'])->name('nuts.get');
Route::post('nuts', [NutsController::class, 'receivePost'])->name('nuts.post');
Route::get('orange', [OrangeController::class, 'getForm'])->name('orange.get');
Route::post('orange', [OrangeController::class,'magic'])->name('orange.post');
Route::get('pineapple', [PineappleController::class, 'getForm'])->name('pineapple.get');
Route::post('pineapple', [PineappleController::class, 'receivePost'])->name('pineapple.post');
Route::get('queen', [QueenController::class, 'getForm'])->name('queen.get');
Route::post('queen', [QueenController::class, 'receivePost'])->name('queen.post');
Route::get('raspberry',[RaspberryController::class, 'getform'])->name('raspberry.get');
Route::post('raspberry', [RaspberryController::class, 'receivePost'])->name('raspberry.post');
Route::get('strawberry', [StrawberryController::class, 'getform'])->name('strawberry.get');
Route::post('strawberry', [StrawberryController::class, 'receivePost'])->name('strawberry.post');
Route::get('tomato', [TomatoController::class, 'getform'])->name('tomato.get');
Route::post('tomato', [TomatoController::class, 'receivePost'])->name('tomato.post');
Route::get('unicorn', [UnicornController::class, 'getForm'])->name('unicorn.get');
Route::post('unicorn', [UnicornController::class, 'receivePost'])->name('unicorn.post');
Route::get('vanilla', [VanillaController::class, 'getForm'])->name('vanilla.get');
Route::post('vanilla', [VanillaController::class, 'receivePost'])->name('vanilla.post');
Route::get('world', [WorldController::class, 'getForm'])->name('world.get');
Route::post('world', [WorldController::class, 'receivePost'])->name('world.post');
Route::get('xenon', [XenonController::class, 'getForm'])->name('xenon.get');
Route::post('xenon', [XenonController::class, 'receivePost'])->name('xenon.post');
Route::get('yggdrasil', [YggdrasilController::class, 'getForm'])->name('yggdrasil.get');
//Route::post('yggdrasil', [YggdrasilController::class, 'receivePost'])->name('yggdrasil.post')->withoutMiddleware(VerifyCsrfToken::class);
Route::post('yggdrasil', [YggdrasilController::class, 'receivePost'])->name('yggdrasil.post');
Route::view('yggdrasil_csrf', 'yggdrasil_csrf');
Route::get('zodiac',[ZodiacController::class, 'getForm'])->name('zodiac.get');
Route::post('zodiac',[ZodiacController::class, 'receivePost'])->name('zodiac.post');

Route::get('zgreen01', [ZGreen01Controller::class, 'getForm'])->name('zgreaan01.form');
Route::post('zgreen01', [ZGreen01Controller::class, 'submitForm'])->name('zgreen01.submit');
Route::get('zgreen02', [ZGreen02Controller::class, 'getForm']);
Route::post('zgreen02', [ZGreen02Controller::class, 'submitForm'])->name('zgreen02.submit');
Route::get('zgreen03', [ZGreen03Controller::class, 'getForm']);
Route::post('zgreen03', [ZGreen03Controller::class, 'submitForm'])->name('zgreen03.submit');
Route::get('znavy01', [ZNavy01Controller::class, 'getForm']);
Route::post('znavy01', [ZNavy01Controller::class, 'saveColor'])->name('saveColor');
Route::get('znavy02', [ZNavy02Controller::class, 'getForm']);
Route::post('znavy02',[ZNavy02Controller::class, 'findColor'])->name('findColor');
Route::get('znavy03', [ZNavy03Controller::class, 'getForm']);
Route::post('znavy03', [ZNavy03Controller::class, 'showUpdateForm'])->name('showUpdateForm');
Route::post('znavy03a',[ZNavy03Controller::class, 'updateColor'])->name('updateColor');
Route::get('znavy04',[ZNavy04Controller::class, 'getForm']);
Route::post('znavy04',[ZNavy04Controller::class, 'deleteColor'])->name('deleteColor');
Route::get('znavy05',[ZNavy05Controller::class, 'index']);

Route::get('challenge', [_ChallengeController::class, 'getView'])->name('_challenge.post');
Route::post('challenge', [_ChallengeController::class, 'receivePost'])->name('_challenge.post');

