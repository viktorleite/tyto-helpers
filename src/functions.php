<?php
/**
 * @author ViktorLeite <viktorleite.s@gmail.com>
 */
declare(strict_types=1);

/**
 * Determina se está vazia
 * Podemos gerar um aviso se a variavel não existir?
 * 
 * 
 * @param mixed $var
 * 
 * @return bool 
 */
function isEmpty(mixed $var): bool {
    // $var = 0;
    // $var = -0;
    // $var = 0.0;
    // $var = -0.0;
    // $var = '0';
    // $var = 0.5;
    // $var = '0.01';
    // $var = null;
    // $var = '';
    // $var = [];
    // $var = [0];
    // $var = false;
    // $var = 'false';

    if (is_null($var)) {
        return true;
    }

    if (is_string($var)) {
        return trim($var) === '';
    }

    if (is_array($var)) {
        return empty($var);
    }

    return !isset($var) || $var == false;
}

/**
 * @param mixed $value
 */
function isBlank(mixed $value): bool
{
    if(is_null($value)) {
        return true;
    }

    if(is_string($value)) {
        return trim($value) === '';
    }

    if(is_numeric($value) || is_bool($value)) {
        return false;
    }

    if($value instanceof Countable) {
        return count($value) === 0;
    }

    if($value instanceof Stringable) {
        return trim((string) $value) === '';
    }

    return empty($value);
}


/**
 * $product = cast($target, Product::class)
 * 
 * @return object 
 */
function cast(object $object, string $class)
{
    if(!$object instanceof $class) {
        throw new InvalidArgumentException("Expected $class");
    }

    return $object;
}

function dd(mixed ...$vars): never
{
    foreach($vars as $v) {
        echo "<pre><code>";
        var_dump($v);
        echo "</code></pre></br>";
    }

    exit(1);
}

/** 
 * Escape de saída contra XSS. USAR EM TODA SAÍDA DINÂMICA. 
 * @param string|int|float|null
*/
function e(?string $value, $doubleEncode = true): string
{
    return htmlspecialchars(
        $value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', $doubleEncode
    );
}

function env(string $key, mixed $default = null): mixed
{
    return $_ENV[$key] ?? getenv($key) ?: $default;
}

function windows_os(): bool
{
    return PHP_OS_FAMILY === 'windows';
}

/**
 * @param \DateTimeZone|string|null $timezone
 */
function now($timezone = null)
{}

/**
 * Percorre o array removendo os espaçoes em branco nos seus valores
 *
 * @param array $items
 * @return array
 */
function array_trim(array $items): array
{
	$retorno = [];

	foreach ($items as $item) {
		if (is_string($item)) {
			$retorno[] = trim($item);
		} else if (is_array($item)) {
			$retorno[] = array_trim($item);
		} else {
			$retorno[] = $item;
		}
	}

	return $retorno;
}


/**
 * Função para remover elementos de um array associativo
 * @param array $haystack - O Array
 * @param array ...$needle - As chaves que quer remover
 */
function array_remove_keys(?array $haystack, ...$needle): array
{
    if ($haystack === null) {
        return [];
    }

    $newHayStack = [];

    foreach ($haystack as $key => $value) {
        if (in_array($key, $needle, true)) {
            continue;
        }
        $newHayStack[$key] = $value;
    }

    return $newHayStack;
}

/**
 * Retorna true ou false que indica se um valor
 * reconhecida como um numero ou se for possivel 
 * converter em um numero.
 *
 * @param mixed $param
 * @return boolean
 */
function isNumeric($param): bool
{
	if (is_int($param) || is_float($param)) {
		return true;
	}

	if (is_bool($param) || is_null($param) || is_array($param) || is_object($param)) {
		return false;
	}

	if (is_string($param)) {
		$param = trim((string)$param);

		if ($param == '') {
			return false;
		}

		$regex = '/^[-+]?\d+(\.\d*)?([eE][-+]?\d+)?$/';
		$regexHex = '/0x[0-9a-fA-F]+$/';

		if (preg_match($regex, $param)) {
			return true;
		}

		if (preg_match($regexHex, $param)) {
			return true;
		}

		return false;
	}

	return false;
}