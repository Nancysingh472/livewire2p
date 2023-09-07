@include ('include/header')
<x-app-layout>
   

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">

                {{-- include side menubar --}}
     @include ('include/sidebar')
 
 <div class="p-4 sm:ml-64">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h2 class="text-center text-blue-600 my-5 text-2xl">Edit Category</h2>

   <form method="POST" action="{{ url('update-category/'.$fcategory->id) }}">
    @csrf
    @method('PUT')
   
    <div class="mb-6">
        <div class="flex">
        
        <input type="text" value="{{$fmakes->makes}}"name="category"id="website-admin" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add new Category">
        </div>
   </div>
   <div class="text-center">
    <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Category</button>
   </div>  
</form>
        </div>
    </div>
 </div>
        </div>
    </div>
    </div>
</x-app-layout>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
    </body>
</html>
