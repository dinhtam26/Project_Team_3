<?php
// Error arrays
$errors = [];

// Sources arrays
$sources = [];

// Rule arrays
$rules = [];

// Result arrays
$result = [];

// Construct
function initValidate($src)
{
    global $sources;
    $sources = $src;
}

// Add rules
function addRules($rule)
{
    global $rules;
    $rules = array_merge($rule, $rules);
}

// Add rule
function addRule($element, $type, $options = null, $required = true)
{
    global $rules;
    $rules[$element] = ['type' => $type, 'options' => $options, 'required' => $required];
}

// Hàm lấy errors
function getErrors()
{
    global $errors;
    return $errors;
}

function getSource()
{
    global $sources;
    return $sources;
}

// Hàm lấy errors
function getResult()
{
    global $result;
    return $result;
}

// Run
function run()
{
    global $sources, $rules, $errors, $result;

    foreach ($rules as $element => $value) {
        if ($value['required'] == true && trim($sources[$element]) == null) {
            $errors[$element] = $sources[$element] . "Không được để rỗng";
        } else {
            switch ($value['type']) {
                case 'int':
                    validateInt($element, $value['options']['min'], $value['options']['max']);
                    break;
                case 'string':
                    validateString($element, $value['options']['min'], $value['options']['max']);
                    break;
                case 'email':
                    validateEmail($element);
                    break;
                case 'status':
                    validateStatus($element);
                    break;
                case 'password':
                    validatePassword($element);
                    break;
                case 'date':
                    validateDate($element, $value['options']['start'], $value['options']['end']);
                    break;
                case 'group':
                    validateGroup($element);
                    break;
                case 'recordExits':
                    validateRecordExits($element, $value['options']);
                    break;
            }
        }

        // Kiểm tra xem các giá trị có thuộc mảng Error k. Nếu không thì cho chúng thuộc mảng Result
        if (!array_key_exists($element, $errors)) {
            $result[$element] = $sources[$element];
        }
    }
    $elementNotValidate = array_diff_key($sources, $errors);
    $result = array_merge($elementNotValidate, $result);
}

function validateInt($element, $min, $max)
{
    global $sources, $errors;
    if (!filter_var($sources[$element], FILTER_VALIDATE_INT, ["options" => ["min_range" => $min, "max_range" => $max]])) {
        $errors[$element] = $sources[$element] . " is an in valid integer";
    }
}

function validateString($element, $min, $max)
{
    global $sources, $errors;
    if (!is_string($sources[$element])) {
        $errors[$element] = $sources[$element] . " is an invalid string";
    } else {
        if (strlen($sources[$element]) < $min) {
            $errors[$element] = $sources[$element] . " is too short";
        } else if (strlen($sources[$element]) > $max) {
            $errors[$element] = $sources[$element] . " is too long";
        }
    }
}

function validateUrl($element)
{
    global $sources, $errors;
    if (!filter_var($sources[$element], FILTER_VALIDATE_URL)) {
        $errors[$element] = $sources[$element] . " is invalid Url";
    }
}

function validateEmail($element)
{
    global $sources, $errors;
    if (!filter_var($sources[$element], FILTER_VALIDATE_EMAIL)) {
        $errors[$element] = $sources[$element] . " is invalid Email";
    }
}

function validateStatus($element)
{
    global $sources, $errors;
    if ($sources[$element] < 0 || $sources[$element] > 1) {
        $errors[$element] =  "Select Status";
    }
}

function validatePassword($element)
{
    global $sources, $errors;
    $patternPassword = '#^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}$#i';
    if (!preg_match($patternPassword, $sources[$element])) {
        $errors[$element] =  "Password bao gồm ký tự viết hoa, số, ký tự đặc biệt và 8 ký tự";
    }
}

function validateDate($element, $start, $end)
{
    global $sources, $errors;
    // Start 
    $arrDateStart = date_parse_from_format('d/m/Y', $start);
    $tsStart      = mktime(0, 0, 0, $arrDateStart['month'], $arrDateStart['day'], $arrDateStart['year']) . "<br/>";

    // Current
    $arrDateCurrent = date_parse_from_format('d/m/Y', $sources[$element]);
    $tsCurrent      = mktime(0, 0, 0, $arrDateCurrent['month'], $arrDateCurrent['day'], $arrDateCurrent['year']);

    // End
    $arrDateEnd = date_parse_from_format('d/m/Y', $end);
    $tsEnd      = mktime(0, 0, 0, $arrDateEnd['month'], $arrDateEnd['day'], $arrDateEnd['year']) . "<br/>";

    if ($tsEnd <= $tsCurrent) {
        $errors[$element] = $sources[$element] . " is an invalid date";
    }
}

function validateGroup($element)
{
    global $sources, $errors;
    if ($sources[$element] <= 0) {
        $errors[$element] =  "Select Group";
    }
}

function validateRecordExits($element, $options)
{
    global $sources, $errors;
    $database = $options['database'];
    echo $query    = $options['query'];

    if ($database->exits($query) == false) {
        $errors[$element] = "record is exits";
    }
}

function isValid()
{
    global $errors;
    if (count($errors) > 0) {
        return false;
    }
    return true;
}
