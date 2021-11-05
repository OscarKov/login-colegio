<?php
namespace Helpers\View;

class ViewHelper {
    public static function constructView($templatePath, ...$elements) {
        try {
            $contentStr = file_get_contents($templatePath);
            return sprintf($contentStr, ...$elements);
        } catch (\Throwable $th) {
            die($th);
        }
    }
}