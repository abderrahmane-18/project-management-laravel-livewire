<?php 
namespace App\Enums;
enum TaskEnumType:string{
   
    case PENDING ='pending';
    case PROGRESS ='in-progress';
    case COMPLETED= 'completed';
}