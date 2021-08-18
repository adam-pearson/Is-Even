<?php

$buildFile = fopen("isEven.js", "w");
function buildContents($max) {
    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    $string = "";
    $string .= "function isEven(number) {\n";
    $string .= "\tif (number === 1 || number === '" . $f->format(1) . "' || number === '" . strtoupper($f->format(1)) . "' || number === '" . ucfirst($f->format(1)) . "') return false;\n";
    for ($i = 1; $i <= $max; $i++) {
        if ($i % 2 === 0 && $i != 1) {
            $string .= "\t\telse if (number === $i || number === '" . $f->format($i) . "' || number === '" . strtoupper($f->format($i)) . "' || number === '" . ucfirst($f->format($i)) . "' || number === '" . ucwords($f->format($i)) . "') return true;\n";
        } elseif ($i != 1) {
            $string .= "\t\telse if (number === $i || number === '" . $f->format($i) . "' || number === '" . strtoupper($f->format($i)) . "' || number === '" . ucfirst($f->format($i)) . "' || number === '" . ucwords($f->format($i)) . "') return false;\n";
        }
    }
    $string .= "}\n";
    $string .= "module.exports = isEven";
    return $string;
};
fwrite($buildFile, buildContents(2800));
fclose($buildFile);

?>