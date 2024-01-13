<x-admin-layout>
    <div class="flex flex-col items-center justify-start w-full h-screen mt-5">
        <div class="flex flex-col w-11/12 h-5/6">
            <!-- Top -->
            <div class="flex flex-row items-center justify-start gap-2 w-3/6 h-11">
                <h1 class="text-2xl font-semibold">
                    Manage Pets
                </h1>
                <h2 class="text-md font-medium text-gray-400">
                    Add New Pet
                </h2>
            </div>
            <!-- Content -->
            <div class="flex w-full h-full p-1">
                <form action="" class="flex flex-row items-center justify-between w-full h-full">
                    @csrf
                    @method('patch')
                    <!-- Left -->
                    <div class="flex w-3/6 h-full">
                        <div class="flex flex-col w-full items-center justify-around p-2">
                            <!-- Top -->
                            <div class="flex flex-col justify-center w-full h-2/4 rounded-md p-5" style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;"> 
                                <h1 class="text-lg font-semibold mb-3">
                                    Basic Information
                                </h1>
                                <div>
                                    <!-- Name -->
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="outline-border bg-white border-blue shadow-md w-96" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Pet Name"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                
                                <div>
                                    <!-- Type -->
                                    <x-input-label for="name" :value="__('Type')" />
                                    <x-text-input id="name" class="outline-border bg-white border-blue shadow-md w-96" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Pet Type"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
    
                                <div>
                                    <!-- Age -->
                                    <x-input-label for="name" :value="__('Age')" />
                                    <x-text-input id="name" class="outline-border bg-white border-blue shadow-md w-96" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Pet Age"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <!-- Bottom -->
                            <div class="flex flex-col w-full h-2/4 rounded-md p-5 mt-4" style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                                <h1 class="text-lg font-semibold mb-3">
                                    Other Information
                                </h1>
                                <div>
                                    <!-- Weight -->
                                    <x-input-label for="name" :value="__('Weight')" />
                                    <x-text-input id="name" class="outline-border bg-white border-blue shadow-md w-96" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Pet Weight"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
    
                                <div>
                                    <!-- Gender -->
                                    <x-input-label for="name" :value="__('Gender')" />
                                    <x-text-input id="name" class="outline-border bg-white border-blue shadow-md w-96" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Pet Gender"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div>
                                    <!-- Type -->
                                    <x-input-label for="name" :value="__('Breed')" />
                                    <x-text-input id="name" class="outline-border bg-white border-blue shadow-md w-96" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Pet Breed"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right -->
                    <div class="flex w-3/6 h-full">
                        <div class="flex w-full flex-col items-center justify-around">
                            <!-- Top -->
                            <div class="flex flex-col justify-around w-full h-2/4 rounded-md p-2" style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;"> 
                                <h1 class="text-lg font-semibold p-2">
                                    Image Upload
                                </h1>

                                <x-petfile-input />
                            </div>
                            <!-- Bottom -->
                            <div class="flex flex-col w-full h-2/4 rounded-md p-2 mt-4" style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                                <h1 class="text-lg font-semibold p-2">
                                    About Pet
                                </h1>
                                <div>
                                    <!-- Summary -->
                                    <x-input-label for="name" :value="__('Summary')" />
                                    <x-text-input id="name" class="outline-border bg-white border-blue shadow-md w-96" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="About The Pet"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>