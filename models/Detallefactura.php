<?php

class Detallefactura extends Eloquent{




	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'detallefactura';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	

	/**
	* Los atributos que son llenables en el modelo	
	*
	* @var array
	*/
	//protected $fillable = array('idest');

	protected $perPage = 5;

	public $errors;

public function validAndSave($data)
    {
    	//	Revisamos si la data es válida
    	if ($this->isValid($data))
    	{
    		//	Si la data es valida se la asignamos al usuario
    		$this->fill($data);

    		//	Guardamos el usuario
    		$this->save();

    		return true;
    	}

    	return false;
    }

public function isValid($data)
    {
        $rules = array(
            'idest'     => 'required',
        );
		
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function factura()
    {
        return $this->belongsTo('Factura', 'id');
    }

    public function rubros()
    {
        return $this->belongsToMany('Rubros','id');
    }


}