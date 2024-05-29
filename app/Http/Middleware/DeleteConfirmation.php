<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class DeleteConfirmation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // if ($request->isMethod('delete')) {
        //     $resp = Alert::warning('Are you sure?', 'This action cannot be undone.');
        //     if ($resp) {
        //         return $next($request);
        //     }
        //     // If the user cancels, redirect back with an appropriate message
        //     return redirect()->back()->with('warning', 'La eliminación del registro ha sido cancelada.');
        // }
        $response = $next($request);
        
        if($request->session()->has('success' )){
            Alert::success('Success', $request->session()->get('success'));
        }

        return  $response;
    }
}
