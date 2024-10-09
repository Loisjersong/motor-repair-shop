<x-app-layout>
    <div class="flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Add User
                    </h3>
                </div>

                <form method="POST" action="{{ route ('users.store')}}">
                    @csrf
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <!-- First Name -->
                            <div>
                                <x-form-label for="first_name">First Name</x-form-label>
                                <x-form-input type="text" name="first_name" required></x-form-input>
                                <x-input-error :messages="$errors->get('first_name')" />
                            </div>

                            <!-- Last Name -->
                            <div>
                                <x-form-label for="last_name">Last Name</x-form-label>
                                <x-form-input type="text" name="last_name" required></x-form-input>
                                <x-input-error :messages="$errors->get('last_name')" />
                            </div>

                            <div>
                                <x-form-label for="email">Email</x-form-label>
                                <x-form-input type="email" name="email" required></x-form-input>
                                <x-input-error :messages="$errors->get('email')" />
                            </div>

                            <div>
                                <x-form-label for="phone">Mobile Number</x-form-label>
                                <x-form-input type="number" name="phone" required></x-form-input>
                                <x-input-error :messages="$errors->get('phone')" />
                            </div>

                            <div>
                                <x-form-label for="password">Password</x-form-label>
                                <x-form-input type="password" name="password" required></x-form-input>
                                <x-input-error :messages="$errors->get('password')" />
                            </div>

                            <div>
                                <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                                <x-form-input type="password" name="password_confirmation" required></x-form-input>
                                <x-input-error :messages="$errors->get('password_confirmation')" />
                            </div>

                            <div>
                                <x-form-label for="date_of_birth">Date of Birth</x-form-label>
                                <x-form-input type="date" name="date_of_birth" required></x-form-input>
                                <x-input-error :messages="$errors->get('date_of_birth')" />
                            </div>

                            <div>
                                <x-form-label for="role_id">Role</x-form-label>
                                <x-form-select name="role_id" id="role_id" class="form-select" required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </x-form-select>
                                <x-input-error :messages="$errors->get('role_id')" />
                            </div>

                        </div>
                    </div>
                    <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
