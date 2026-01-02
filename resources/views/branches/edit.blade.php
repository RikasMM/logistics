<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Branch') }}: {{ $branch->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('branches.update', $branch) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="col-span-2">
                                <x-label for="name" value="{{ __('Branch Name') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $branch->name)" required autofocus />
                                <x-input-error for="name" class="mt-2" />
                            </div>

                            <!-- Branch Type -->
                            <div>
                                <x-label for="branch_type_id" value="{{ __('Branch Type') }}" />
                                <select id="branch_type_id" name="branch_type_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="" disabled>Select Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}" {{ old('branch_type_id', $branch->branch_type_id) == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error for="branch_type_id" class="mt-2" />
                            </div>

                            <!-- Region -->
                            <div>
                                <x-label for="region_id" value="{{ __('Region / Zone') }}" />
                                <select id="region_id" name="region_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                    <option value="" disabled>Select Region</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}" {{ old('region_id', $branch->region_id) == $region->id ? 'selected' : '' }}>
                                            {{ $region->name }} ({{ $region->code }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error for="region_id" class="mt-2" />
                            </div>

                            <!-- Manager -->
                            <div>
                                <x-label for="manager_id" value="{{ __('Branch Manager') }}" />
                                <select id="manager_id" name="manager_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">-- Select Manager --</option>
                                    @foreach($managers as $manager)
                                        <option value="{{ $manager->id }}" {{ old('manager_id', $branch->manager_id) == $manager->id ? 'selected' : '' }}>
                                            {{ $manager->name }} ({{ $manager->email }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error for="manager_id" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-label for="email" value="{{ __('Email Address') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $branch->email)" />
                                <x-input-error for="email" class="mt-2" />
                            </div>

                            <!-- Phone -->
                            <div>
                                <x-label for="phone" value="{{ __('Phone') }}" />
                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $branch->phone)" />
                                <x-input-error for="phone" class="mt-2" />
                            </div>

                             <!-- Address -->
                             <div class="col-span-2">
                                <x-label for="address" value="{{ __('Address') }}" />
                                <textarea id="address" name="address" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('address', $branch->address) }}</textarea>
                                <x-input-error for="address" class="mt-2" />
                            </div>

                             <!-- Status -->
                             <div class="col-span-2">
                                <label for="is_active" class="flex items-center">
                                    <input type="hidden" name="is_active" value="0">
                                    <x-checkbox id="is_active" name="is_active" value="1" :checked="old('is_active', $branch->is_active)" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Branch is Active') }}</span>
                                </label>
                            </div>

                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('branches.index') }}" class="underline text-sm text-gray-600 hover:text-gray-900 mr-4">
                                {{ __('Cancel') }}
                            </a>
                            <x-button class="ml-4">
                                {{ __('Update Branch') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
