<?php

    /**
     * Cette fonction permet de vérifier si la valeur est vide.
     *
     * Elle retourne true si elle est vide, "false" dans le cas contraire.
     * 
     * @param string $value
     * 
     * @return boolean
     */
    function is_blank(string $value) : bool
    {
        if ( !is_string($value) )
        {
            return true;
        }

        if ( mb_strlen($value, "UTF-8") == 0 )
        {
            return true;
        }

        return false;
    }


    /**
     * Cette fonction permet de vérifier si la valeur n'est pas vide.
     *
     * Elle retourne "true" si la valeur n'est pas vide, "false" dans le cas contraire.
     * 
     * @param string $value
     * 
     * @return boolean
     */
    function is_not_blank(string $value) : bool
    {
        if ( !is_string($value) )
        {
            return true;
        }

        if ( mb_strlen($value, "UTF-8") == 0 )
        {
            return false;
        }

        return true;
    }

    /**
     * Cette fonction vérifie si longueur de la valeur est supérieur ou non à la longueur attendue.
     * 
     * Elle retourne "true" si la longueur de la valeur est supérieur, "false" dans la cas contraire.
     *
     * @param string $value
     * @param int $expected_length
     * 
     * @return boolean
     */
    function length_is_greater_than(string $value, int $expected_length) : bool
    {
        if ( ! is_string($value) )
        {
            return true;
        }

        if (mb_strlen($value) > $expected_length) 
        {
            return true;
        }
        
        return false;

        // return (mb_strlen($value) > $expected_length) ? true : false;
    }

    /**
     * Cette fonction vérifie si longueur de la valeur est inférieur ou non à la longueur attendue.
     * 
     * Elle retourne "true" si la longueur de la valeur est inférieur, "false" dans la cas contraire.
     *
     * @param string $value
     * @param int $expected_length
     * 
     * @return boolean
     */
    function length_is_less_than(string $value, int $expected_length) : bool
    {
        if ( ! is_string($value) )
        {
            return true;
        }

        if (mb_strlen($value) < $expected_length) 
        {
            return true;
        }
        
        return false;

        // return (mb_strlen($value) < $expected_length) ? true : false;
    }


    /**
     * Cette fonction vérifie si la valeur est un email valide ou non.
     * 
     * Elle retourne "true" si la valeur est un email invalide, "false" dans le cas contraire.
     *
     * @param string $value
     * @return boolean
     */
    function is_invalid_email(string $value) : bool
    {
        if ( filter_var($value, FILTER_VALIDATE_EMAIL) )
        {
            return false;
        }

        return true;

        // return (filter_var($value, FILTER_VALIDATE_EMAIL)) ? false : true;
    }



    /**
     * Cette fonction vérifie si la valeur existe déjà dans une colonne d'une table de la base de données ou non.
     * 
     * Elle retourne "true" si la valeur existe déjà, "false" dans le cas contraire.
     *
     * @param string $value
     * @param string $table
     * @param string $column
     * 
     * @return boolean
     */
    function is_already_exists_on_create(string $value, string $table, string $column) : bool
    {
        // Etablissons une connexion avec la base de données.
        require __DIR__ . "/../db/connexion.php";

        $req = $db->prepare("SELECT * FROM {$table} WHERE {$column} = :{$column} LIMIT 1");
        // $db->prepare("SELECT * FROM contact WHERE email = :email");

        $req->bindValue(":{$column}", $value);

        $req->execute();
        // $req->fetch();

        $row = $req->rowCount();
        $req->closeCursor();
        

        if ($row == 0) 
        {
            return false;
        }

        return true;

        // ($row  == 0) ? false : true; 
    }


    /**
     * Cette fonction vérifie si la valeur est un nombre ou non.
     *
     * Elle retourne "true" si ce n'est pas un nombre, "false" dans le cas contraire.
     * 
     * @param string $value
     * 
     * @return boolean
     */
    function is_not_a_number(string $value) : bool
    {
        
        if ( ! is_numeric($value) )  
        {
            return true;
        }

        return false;
    }


    /**
     * Cette fonction vérifie si la valeur est comprise entre le minimum et le maximum
     *
     * Elle retourne "true" si ce n'est pas entre le min et le max, "false" dans le cas contraire.
     * 
     * @param string $value
     * @param integer $min
     * @param integer $max
     * 
     * @return boolean
     */
    function is_not_between(string $value, int $min, int $max) : bool
    {
        $value_converted = (int) $value;

        // var_dump($value_converted); die();

        if ( ($value_converted < $min) || ($value_converted > $max) )
        {
            return true;
        }
        
        return false;
    }


   /**
    * Cett fonction verifie si le numero de telephone est valide ou non 
    *
    *Elle retourne true si le numéro n'est pas valide, false dans le cas contraire
    * @param string $value
    * @return boolean
    */
    function is_invalid_phone(string $value) : bool
    {
        if(preg_match("/^[0-9\s\-\+\(\)]{5,30}$/", $value))
        {
            return false;
        }
        return true;
    }
    // function is_not_int() : bool
    // {

    // }