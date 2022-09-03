<?php

namespace App\Policies;

use App\Sale;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any sales.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewadmine(User $user)
    {
        if ($user->status==1) {
            return true;
        }else{
            return false;
        }
    }

    public function viewmagazine(User $user)
    {
        if ($user->status==2) {
            return true;
        }else{
            return false;
        }
    }

    public function viewdeliverywalkin(User $user)
    {
        if ($user->status==3) {
            return true;
        }else{
            return false;
        }
    }

    public function viewdeliveryexit(User $user)
    {
        if ($user->status==4) {
            return true;
        }else{
            return false;
        }
    }
    public function notviewadmine(User $user)
    {
        if ($user->status==1) {
            return false;
        }else{
            return true;
        }
    }

    public function notviewmagazine(User $user)
    {
        if ($user->status==2) {
            return false;
        }else{
            return true;
        }
    }

    public function notviewdeliverywalkin(User $user)
    {
        if ($user->status==3) {
            return false;
        }else{
            return true;
        }
    }

    public function notviewdeliveryexit(User $user)
    {
        if ($user->status==4) {
            return false;
        }else{
            return true;
        }
    }

    public function notviewdeliverywalkinandviewmagazin(User $user)
    {
        if ($user->status==3 and $user->status==2) {
            return false;
        }else{
            return true;
        }
    }

    public function notviewdeliveryexitandanddeliverywalkin(User $user)
    {
        if ($user->status==3 and $user->status==4) {
            return false;
        }else{
            return true;
        }
    }

    public function notviewdeliveryexitandmagazin(User $user)
    {
        if ($user->status==4 and $user->status==2) {
            return false;
        }else{
            return true;
        }
    }




    
    public function Adminedeliverywalkin(User $user)
    {
        if ($user->status==1) {
            return true;
        }elseif ($user->status==2) {
            return false;
        }elseif ($user->status==3) {
            return true;
        }else{
            return false;
        }
    }

    public function Adminedeliveryexit(User $user)
    {
        if ($user->status==1) {
            return true;
        }elseif ($user->status==2) {
            return false;
        }elseif ($user->status==3) {
            return false;
        }else{
            return true;
        }
    }

    public function Adminemagazin(User $user)
    {
        if ($user->status==1) {
            return true;
        }elseif ($user->status==2) {
            return true;
        }elseif ($user->status==3) {
            return false;
        }else{
            return false;
        }
    }

    public function Active(User $user)
    {
        if ($user->active==1) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can view the sale.
     *
     * @param  \App\User  $user
     * @param  \App\Sale  $sale
     * @return mixed
     */
    public function view(User $user, Sale $sale)
    {
        
    }

    /**
     * Determine whether the user can create sales.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the sale.
     *
     * @param  \App\User  $user
     * @param  \App\Sale  $sale
     * @return mixed
     */
    public function update(User $user, Sale $sale)
    {
        //
    }

    /**
     * Determine whether the user can delete the sale.
     *
     * @param  \App\User  $user
     * @param  \App\Sale  $sale
     * @return mixed
     */
    public function delete(User $user, Sale $sale)
    {
        //
    }

    /**
     * Determine whether the user can restore the sale.
     *
     * @param  \App\User  $user
     * @param  \App\Sale  $sale
     * @return mixed
     */
    public function restore(User $user, Sale $sale)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the sale.
     *
     * @param  \App\User  $user
     * @param  \App\Sale  $sale
     * @return mixed
     */
    public function forceDelete(User $user, Sale $sale)
    {
        //
    }
}
