<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	* Los atributos que son llenables en el modelo	
	*
	* @var array
	*/
	protected $fillable = array('email', 'username', 'name', 'password');

	protected $perPage = 2;

	public $errors;

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function isValid($data)
    {
        // $rules = array(
        //     'email'     => 'required|email|unique:users',
        //     'name' => 'required|min:4|max:40',
        //     'password'  => 'min:8|confirmed'
        // );
		
    	//	Si el usuario existe:
    	if ($this->exists)
    	{
	   		$rules = array();

    		//	Evitamos que la regla "unique" tome en cuenta el email del usuario actual
    		//$rules['email'] .= ',email,'.$this->id; 
    	}
    	else //	Si no existe
    	{
    		$rules = array(
	            'email'     => 'required|email|unique:users',
	            'name' => 'required|min:4|max:40',
	            'password'  => 'min:8|confirmed|required'
	        );

    		//	La clave es obligatoria
    		//$rules['password'] .= '|required';
    	}

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }

    public function setPasswordAttribute($value)
    {
    	if (!empty($value))
    	{
    		$this->attributes['password'] = Hash::make($value);
    	}
    }

    public function getFullNameAttribute()
    {
    	return strtoupper($this->attributes['name']);
    }

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
	

}