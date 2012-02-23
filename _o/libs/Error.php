<?php

class Error {
	
    protected $errors;

    function __construct($code = null, $error = null)
    {
		if (is_null($code) || is_null($error)) return;
		
        $this->clear();
        $this->add($code, $error);
    }

    function add($code, $error)
    {
		if (is_string($error))
		{
        	$this->errors[$code][] = $error;
		}
		elseif (is_array($error) && $error[0] instanceof LibXMLError)
		{
			foreach ($error as $e) 
			{
				$levels = array(
					LIBXML_ERR_WARNING => 'Warning',
					LIBXML_ERR_ERROR => 'Error',
					LIBXML_ERR_FATAL => 'Fatal Error'
				);
				$this->add($code, "{$levels[$e->level]} $e->code (Line: $e->line, Column: $e->column): $e->message");	
			}
			libxml_clear_errors();	
		}
    }
	

    function isEmpty($code = null)
    {
        return (is_null($code) && empty($this->errors)) || (!is_null($code) && empty($this->errors[$code]));
    }

    function get($code = null)
    {
        if ($this->isEmpty($code)) return false;
		
		return is_null($code) ? $this->errors : $this->errors[$code];
    }

    function is($code)
    {
        return !$this->isEmpty($code);
    }

    function listIt($code = null, $echo = true)
    {
        if ($this->isEmpty($code)) return '';

        $errors = $this->get($code);
        $out = '<ul class="'.$code.'">';
        foreach ($errors as $error) 
		{
            if (is_array($error)) 
			{
                $out.= '<ul>';
                foreach ($error as $message) 
					$out.= "<li>$message</li>";
                $out.= '</ul>';
            } 
			else 
                $out.= "<li>$error</li>";
        }
        $out.= '</ul>';
		
		if ($echo)
			echo $out;
		else
			return $out;
    }

    function listAll()
    {
        foreach ($this->errors as $code => $message)
			$this->listIt($code);
    }


	function getListAll()
	{
		ob_start();
		$this->listAll();
		return ob_get_clean();
	}
	

    function clear()
    {
        $this->errors = array();
    }
	
	 /**
	 * Checks if argument is an Error object and of specified type.
	 *
	 * @param Object $errors Error object to check.
	 * @return Bool True/False
	 */
	static function isError($obj, $type = false)
	{
		$result = $obj instanceof Error;
		if (is_string($type))
			$result &= $obj->is($type);
		return  $result;
	}
		
}

?>