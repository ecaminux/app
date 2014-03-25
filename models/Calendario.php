<?php

class Calendario extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'calendario';
	public $timestamps = false; 
    protected $fillable = array('id','nom','descri','fec');
    protected $hidden = array();

    protected $perPage = 5;

    public $errors;

    public function validAndSave($data)
    {
    	//	Revisamos si la data es válida
    	if ($this->isValid($data))
    	{
    		$this->fill($data);
    		$this->save();

    		return true;
    	}

    	return false;
    }

	
	public function isValid($data)
    {
        $rules = array(
           'nom'     => 'required',
        );
		
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

}