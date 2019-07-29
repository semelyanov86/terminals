<?php

namespace App\Http\Controllers;

use App\Transformers\TerminalTransformer;
use Illuminate\Http\Request;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class TerminalApiController extends Controller
{
    public function user(Request $request)
    {
        $user = $request->user();
        return fractal()->item($user)->transformWith(new TerminalTransformer)->toArray();
    }

    public function generate(Request $request)
    {
        $terminal = $request->user();
        $generator = new ComputerPasswordGenerator();
        $generator
            ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, false)
            ->setLength(8)
        ;
        $terminal->tmp_pass = $generator->generatePassword();
        $terminal->save();
        return fractal()->item($terminal)->transformWith(new TerminalTransformer)->toArray();
    }
}
