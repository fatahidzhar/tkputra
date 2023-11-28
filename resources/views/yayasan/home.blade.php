@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
@include('layouts.navbar')
@include('layouts.sidebar')
   <div class="p-4 sm:ml-64">
      <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
         <h3 class="text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">
            Dashboard
         </h3>
         <p class="text-md font-semibold italic mt-2 text-gray-600 dark:text-white">
            Welcome Back, {{ Auth::user()->first_name }}
         </p>
         <div class="grid grid-cols-3 gap-4 mt-4 mb-4">
            <div class="flex items-center justify-center h-40 rounded-2xl bg-orange-100 dark:bg-gray-800">
               <div class="grid grid-cols-2 p-2 w-full">
                  <div class="mt-2 pl-3">
                     <p class="text-sm font-medium text-gray-500 dark:text-white">Jumlah Murid</p>
                     <p class="text-2xl font-bold mt-1 text-gray-900 dark:text-white">76</p>
                  </div>
                  <div class="grid mt-3 ml-2">
                     <div class="flex mb-5 -space-x-4">
                        <img class="w-11 h-11 border-2 border-white rounded-full dark:border-gray-800" src="https://picsum.photos/200" alt="">
                        <img class="w-11 h-11 border-2 border-white rounded-full dark:border-gray-800" src="https://picsum.photos/200" alt="">
                        <img class="w-11 h-11 border-2 border-white rounded-full dark:border-gray-800" src="https://picsum.photos/200" alt="">
                        <img class="w-11 h-11 border-2 border-white rounded-full dark:border-gray-800" src="https://picsum.photos/200" alt="">
                     </div>
                  </div>
                  <div class="col-start-1 col-end-3 pr-3 pl-3 mt-5">
                     <button type="button" class="text-black w-full bg-orange-300 hover:bg-orange-400 focus:ring-4 focus:ring-orange-200 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat Keseluruhan</button>
                  </div>
               </div>
            </div>
         <div class="flex items-center justify-center h-40 rounded-2xl bg-red-100 dark:bg-gray-800">
            <div class="grid grid-cols-2 p-2 w-full">
               <div class="mt-2 pl-3">
                  <p class="text-sm font-medium text-gray-500 dark:text-white">Jumlah Guru</p>
                  <p class="text-2xl font-bold mt-1 text-gray-900 dark:text-white">6</p>
               </div>
               <div class="grid mt-3 ml-2">
                  <div class="flex mb-5 -space-x-4">
                     <img class="w-11 h-11 border-2 border-white rounded-full dark:border-gray-800" src="https://picsum.photos/200" alt="">
                     <img class="w-11 h-11 border-2 border-white rounded-full dark:border-gray-800" src="https://picsum.photos/200" alt="">
                     <img class="w-11 h-11 border-2 border-white rounded-full dark:border-gray-800" src="https://picsum.photos/200" alt="">
                     <img class="w-11 h-11 border-2 border-white rounded-full dark:border-gray-800" src="https://picsum.photos/200" alt="">
                  </div>
               </div>
               <div class="col-start-1 col-end-3 pr-3 pl-3 mt-5">
                  <button type="button" class="text-black w-full bg-red-300 hover:bg-red-400 focus:ring-4 focus:ring-red-200 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat Keseluruhan</button>
               </div>
            </div>
         </div>
            <div class="flex items-center justify-center h-40 rounded-2xl bg-green-100 dark:bg-gray-800">
               <div class="grid grid-cols-2 p-2 w-full">
                  <div class="mt-2 pl-3">
                     <p class="text-sm font-medium text-gray-500 dark:text-white">Pengaduan</p>
                     <p class="text-2xl font-bold mt-1 text-gray-900 dark:text-white">4</p>
                  </div>
                  <div class="grid justify-end mt-3 ml-2">
                     <div class="flex mb-5 -space-x-4 w-11 h-11">
                     </div>
                  </div>
                  <div class="col-start-1 col-end-3 pr-3 pl-3 mt-5">
                     <button type="button" class="text-black w-full bg-green-300 hover:bg-green-400 focus:ring-4 focus:ring-green-200 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat Keseluruhan</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="flex justify-between items-center mt-5">
            <div class="">
               <p class="text-2xl font-bold text-gray-900 dark:text-white">Pengaduan</p>
            </div>
            <div class="">
               <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat Semua</button>
            </div>
         </div>
      <div class="flex items-center justify-center pl-3 h-96 dark:bg-gray-800">
         <ol class="relative border-l border-gray-200 dark:border-gray-700">                  
            <li class="mb-10 ml-6">            
               <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                  <img class="rounded-full shadow-lg" src="https://picsum.photos/300" alt="Bonnie image"/>
               </span>
               <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                  <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">just now</time>
                  <div class="text-sm font-normal text-gray-500 dark:text-gray-300">Bonnie moved <a href="#" class="font-semibold text-blue-600 dark:text-blue-500 hover:underline">Jese Leos</a> to <span class="bg-gray-100 text-gray-800 text-xs font-normal mr-2 px-2.5 py-0.5 rounded dark:bg-gray-600 dark:text-gray-300">Funny Group</span></div>
               </div>
            </li>
            <li class="mb-10 ml-6">
               <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                  <img class="rounded-full shadow-lg" src="https://picsum.photos/300" alt="Thomas Lean image"/>
               </span>
               <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                  <div class="items-center justify-between mb-3 sm:flex">
                        <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">2 hours ago</time>
                        <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">Thomas Lean commented on  <a href="#" class="font-semibold text-gray-900 dark:text-white hover:underline">Flowbite Pro</a></div>
                  </div>
                  <div class="p-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">Hi ya'll! I wanted to share a webinar zeroheight is having regarding how to best measure your design system! This is the second session of our new webinar series on #DesignSystems discussions where we'll be speaking about Measurement.</div>
               </div>
            </li>
            <li class="ml-6">
               <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                  <img class="rounded-full shadow-lg" src="https://picsum.photos/300" alt="Jese Leos image"/>
               </span>
               <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                  <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">1 day ago</time>
                  <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">Jese Leos has changed <a href="#" class="font-semibold text-blue-600 dark:text-blue-500 hover:underline">Pricing page</a> task status to  <span class="font-semibold text-gray-900 dark:text-white">Finished</span></div>
               </div>
            </li>
         </ol>
         </div>
         <div class="flex justify-between items-center">
            <p class="text-2xl font-bold text-gray-900 dark:text-white">Analytics</p>
         </div>
         <div class="grid grid-cols-2 h-100 gap-4 mb-4">
            <div class="flex rounded ml-[-20px] dark:bg-gray-800">
               <div id="chartMurid" class="w-full mt-5"></div>
            </div>
            <div class="flex rounded ml-[-20px] dark:bg-gray-800">
               <div id="chartPengaduan" class="w-full mt-5"></div>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
               <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
               <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
            </div>
         </div>
      </div>
   </div>
@endsection