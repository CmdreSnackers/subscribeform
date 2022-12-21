<?php

class SubscribeForm
{

    public $database;

    public function __construct()
    {
        // Only change code below this line 

            // Instruction: add database connection into $this->database
        $this->database = connectToDB();

        // Only change code above this line
    }

    public function subscribe($email)
    {
        // Only change code below this line 

            // Instruction: check if $email is empty or not, if empty, return 'Email is required'

            // Instruction: check if $email is valid, then add it into database, and return 'You have successfully subscribed to our newsletter'
            $error = '';

            if(empty($email))
            {
                $error = 'Must fill email';
            }
    

            if ( !empty( $error ) )
                return $error;

            $state = $this->database->prepare(
                'SELECT * FROM subbers WHERE email = :email'
            );
    
            $state->execute([
                'email' => $email 
            ]);

            $user = $state->fetch();
    

            if ( $user ) {
                return 'Email already exists';
            } else {

                $state = $this->database->prepare(
                    'INSERT INTO subbers ( email )
                    VALUES (:email)'
                );
                $state->execute([
                    'email' => $email 
                ]);

            return 'Sucess';
            }
        // Only change code above this line
    }
}