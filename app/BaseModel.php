<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BaseModel extends Model
{

    /**
     * Save new data to the database.
     *
     * @param [array] $data
     * @param [string] $table
     * @return boolean
     */
    public function store($data){
        $status = DB::table($this->table)->insert($data);
        return $status;
    }


   /**
    * Remove Row from Database
    *
    * @param [int] $id
    * @return int
    */
    public function remove($id){
        $status = DB::table($this->table)->where('id', $id)->delete();
        return $status;
    }


    /**
     * Undocumented function
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function updateRow($data, $id){
        $status = DB::table($this->table)->where('id', $id)->update($data);
        return $status;
    }


    /**
     * Is table row are exists or not?
     *
     * @param [type] $id
     * @return boolean
     */
    public function isIDExists($id){
        $status = DB::table($this->table)->where('id', $id)->exists();
        return $status;
    }


    

}
