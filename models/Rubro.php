<?php

class Rubro extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rubro';
	public $timestamps = false; 
    protected $fillable = array('nom','descri','pre1','pre2','esmat','idcur','iva');
    protected $hidden = array();

    protected $perPage = 5;

    public $errors;

        public function detallefactura()
    {
        return $this->belongsTo('Detallefactura', 'id');
    }


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