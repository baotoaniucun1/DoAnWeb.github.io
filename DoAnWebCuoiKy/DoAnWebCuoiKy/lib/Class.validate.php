<?php
	
	class Validate{
		private $error = array();

		private $source = array();

		// kiểm tra các phần tử trong mảng có hợp lí k?
		private $rules = array();

		private $result = array();

		private $str = "";

		public function __construct($source)
		{
			$this->source = $source;
		}

		public function addRules($rules){
			$this->rules = array_merge($rules, $this->rules);
		}

		public function addRule($element, $type, $min = 0, $max = 0)
		{
			$this->rules[$element] = array('type' => $type, 'min' => $min, 'max' => $max);
			return $this; 
		}
		public function setError($element, $message)
		{
			 $this->error[$element] = '<b>'. $element . '</b>' . $message;
		}
		// tạo phương thức get lỗi
		public function getError()
		{
			return $this->error;
		}

		// tạo phương thức get dữ liệu hợp lệ
		public function getResult()
		{
			return  $this->result;
		}
		public function Run()
		{
			foreach ($this->rules as $element => $value) {
				switch ($value['type']) {
					case 'int':
						$this->validateInt($element, $value['min'], $value['max']);
						break;
					case 'email':
						$this->validateMail($element);
						break;
					case 'password':
						$this->validatePassword($element);
						break;
					case 'phone':
						$this->validatePhoneNumber($element);
						break;
					case 'date';
						$this->validateDate($element, $value['min'], $value['max']);
						break;
					case 'string':
						$this->validateString($element,  $value['min'], $value['max']);
						break;
					case 'name':
						$this->validateTrustName($element);
						break;

				}
				if(!array_key_exists($element, $this->error))
				{
					$this->result[$element] = $this->source[$element];
				}
			}
		}

		private function validateInt($element, $min  = 0, $max = 0)
		{
			$options = array('options' => array('min_range' => $min, 'max_range' => $max));
			if(!filter_var($this->source[$element], FILTER_VALIDATE_INT, $options))
			{	
				$this->setError($element, ' không hợp lệ!');
			}

		}
		private function validateMail($element)
		{
			$pattern = '#^[a-z][a-z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{3,3})$#';

			if(!preg_match($pattern, $this->source[$element]))
			{
				$this->setError($element, ' không hợp lệ!');
			}
		}

		private function validateString($element, $min = 0, $max = 0)
		{
			$length = strlen($this->source[$element]);
			$pattern =  '#^[a-z_][a-z0-9_\.\s]{4,31}$#';

			if($length < $min)
			{
				$this->setError($element, ' quá ngắn!');
			}
			elseif($length > $max)
			{
				$this->setError($element, ' quá dài!');
			}
			elseif(!preg_match($pattern, $this->source[$element]))	
			{
				$this->setError($element, ' không hợp lệ!');
			}
	
		}

		private function validatePhoneNumber($element)
		{
			$pattern =  '#^[0-9\.\s]{9,11}$#';
			if(!preg_match($pattern, $this->source[$element]))	
			{
				$this->setError($element, ' không hợp lệ!');
			}
		}
		private function validatePassword($element)
		{
			$pattern = '#^(?=.*\d)(?=.*[A-Z]).{6,100}$#';
			if(!preg_match($pattern, $this->source[$element]))
			{
				$this->setError($element, ' không hợp lệ!');
			}
		}
		private function validateDate($element, $start, $end)
		{
			$arrDateStart = date_parse_from_format('d/m/Y', $start);
			$timeStart = mktime(0, 0, 0, $arrDateStart['month'], $arrDateStart['day'], $arrDateStart['year']);

			$arrDateEnd = date_parse_from_format('d/m/Y', $end);
			$timeEnd = mktime(0, 0, 0, $arrDateEnd['month'], $arrDateEnd['day'], $arrDateEnd['year']);

			$arrDateCurrent = date_parse_from_format('d/m/Y', $this->source[$element]);
			$timeCurrent = mktime(0, 0, 0, $arrDateCurrent['month'], $arrDateCurrent['day'], $arrDateCurrent['year']);

			if($timeCurrent < $timeStart || $timeCurrent > $timeEnd)
			{
				$this->error[$element] = "' " . $this->source[$element] ."' is not invalid date";
			}
		}
		public function isValid()
		{
			if(count($this->error) > 0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		
	}
