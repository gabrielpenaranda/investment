<x-layouts.admin>

    @livewire('system.language-selector')

    <div  class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs> 
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('messages.Dashboard') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.users.index') }}">
                {{ __('messages.Users') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                {{ __('messages.New') }}
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

         <a href="{{ route('admin.users.index') }}" class="btn btn-danger">{{ __('messages.Return to list') }}</a>
    </div>

    <div class="card">
        <p class="text-2xl mb-4">{{  __('messages.New User') }}</p>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Name') }}</flux:label>
                <flux:input name='name' placeholder="{{ __('messages.Enter the name') }}" value="{{ old('name') }}"/>
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Email') }}</flux:label>
                <flux:input name='email' placeholder="{{ __('messages.Enter the email') }}" value="{{ old('email') }}"/>
                <flux:error name="email" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Country & State') }}</flux:label>
                <select name="state_id" class="select">
                    <option value="" disable selected>{{ __('messages.Select the country and state') }}</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" 
                            {{ old('state_id') == $state->id ? 'selected' : '' }}>
                            {{ $state->country->name }} - {{ $state->name }}
                        </option>
                    @endforeach
                </select>
                <flux:error name="product_id" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Address') }}</flux:label>
                <flux:input name='address' placeholder="{{ __('messages.Enter the address') }}" value="{{ old('address') }}"/>
                <flux:error name="address" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Phone Number') }}</flux:label>
                <flux:input name='phone' placeholder="{{ __('messages.Enter the phone number') }}" value="{{ old('phone') }}"/>
                <flux:error name="phone" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.ZIP Code') }}</flux:label>
                <flux:input name='zip_code' placeholder="{{ __('messages.Enter the zip code') }}" value="{{ old('zip_code') }}"/>
                <flux:error name="zip_code" />
            </flux:field>


            <div x-data="{ userType: '{{ old('type', $user->type ?? 'Admin') }}' }">
                <flux:field>
                    <flux:label class="mt-2!">{{ __('messages.User Type') }}</flux:label>
                    <select 
                        name="type" 
                        class="select" 
                        x-model="userType"
                        @change="userType = $event.target.value"
                    >
                        <option value="" disabled selected>{{ __('messages.Select the user type') }}</option>
                        <option value="Admin" @selected(old('type', $user->type ?? '') === 'Admin')>{{ __('messages.Administrator') }}</option>
                        <option value="Person" @selected(old('type', $user->type ?? '') === 'Person')>{{ __('messages.Person') }}</option>
                        <option value="Company" @selected(old('type', $user->type ?? '') === 'Company')>{{ __('messages.Company') }}</option>
                    </select>
                    <flux:error name="type" />
                </flux:field>

                {{-- Campo Social Security --}}
                <flux:field>
                    <flux:label  x-show="userType === 'Person'"  class="mt-2!">{{ __('messages.Social Security Number') }}</flux:label>
                    <input 
                        type="text" 
                        name="social_security" 
                        x-show="userType === 'Person'"
                        class="input"
                        value="{{ old('social_security', $user->social_security ?? '') }}"
                    />
                    <flux:error name="social_security" />
                </flux:field>

                {{-- Campo FIN (Federal Information Number) --}}
                <flux:field>
                    <flux:label x-show="userType === 'Company'"  class="mt-2!">{{ __('messages.Federal Information Number') }}</flux:label>
                    <input 
                        type="text" 
                        name="fin" 
                        x-show="userType === 'Company'"
                        class="input"
                        value="{{ old('fin', $user->fin ?? '') }}"
                    />
                    <flux:error name="fin" />
                </flux:field>
            </div>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Password') }}</flux:label>
                <flux:input type="password" name='password' placeholder="{{ __('messages.Password') }}" value=""/>
                <flux:error name="password" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Confirm Password') }}</flux:label>
                <flux:input type="password" name='password2' placeholder="{{ __('messages.Confirm Password') }}" value=""/>
                <flux:error name="password2" />
            </flux:field>
 



            {{-- <flux:field>
                <flux:label class="mt-2!">{{ __('messages.User Type') }}</flux:label>
                <select name="type" class="select">
                    <option value="" disable selected>{{ __('messages.Select the user type') }}</option>
                        <option value="Admin"  {{ old('type') }}> {{ __('messages.Administrator') }} </option>
                        <option value="Person"  {{ old('type') }}> {{ __('messages.Person') }} </option>
                        <option value="ompany"  {{ old('type') }}> {{ __('messages.Company') }} </option>
                </select>
                <flux:error name="product_id" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Social Security Number') }}</flux:label>
                <flux:input name='social_security' placeholder="{{ __('messages.Enter the social security number') }}" value="{{ old('social_security') }}"/>
                <flux:error name="social_security" />
            </flux:field>

            <flux:field>
                <flux:label class="mt-2!">{{ __('messages.Federal Identification Number') }}</flux:label>
                <flux:input name='fin' placeholder="{{ __('messages.Enter the federal identification number') }}" value="{{ old('fin') }}"/>
                <flux:error name="fin" />
            </flux:field>
 --}}



            {{-- <div x-data="{ customRateEnabled: $el.querySelector('[name=has_expiration]').checked }">
                <label class="flex items-center space-x-2 mt-2">
                    <input 
                        type="checkbox" 
                        name="has_expiration"
                        x-model="customRateEnabled"
                        value="1"
                        {{ old('has_expiration') ? 'checked' : '' }}
                        class="rounded border-gray-300 text-indigo-600 shadow-sm"
                    >
                    <span class="text-sm text-gray-700">{{ __('messages.user has termination date?') }}</span>
                </label>

                <flux:field>
                    <flux:label class="mt-2!">{{ __('messages.Investment Time (months)') }}</flux:label>
                    <flux:input name='investment_time' placeholder="{{ __('messages.Enter the number of months') }} (12 - 60)" value="{{ old('investment_time') }}"
                         id="investment_time"
                         x-bind:disabled="!customRateEnabled"
                         x-bind:class="{ 'bg-gray-100 cursor-not-allowed': !customRateEnabled }"
                    />
                    <flux:error name="investment_time" />
                </flux:field>
            </div> --}}


            <div class="flex justify-end mt-4">
                <flux:button variant="primary" type="submit">{{  __('messages.Send') }}</flux:button>
            </div>

        </form>
    </div>

</x-layouts.admin>