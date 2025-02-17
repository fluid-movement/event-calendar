<x-app-layout>
    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4 sm:px-10 bg-white border-b border-gray-200">
                    <form method="POST"
                          action="{{ route('events.store') }}"
                          enctype="multipart/form-data"
                          x-data="{
                              startDate: '{{ old('start_date') }}',
                              endDate: '{{ old('end_date') }}',
                              init() {
                                  this.$watch('startDate', value => {
                                      // If endDate is empty or before the new startDate, update it.
                                      if (!this.endDate || new Date(value) > new Date(this.endDate)) {
                                          this.endDate = value;
                                      }
                                  });
                              }
                          }">
                        @csrf

                        <!-- Name Field -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name"
                                          class="block mt-1 w-full"
                                          type="text"
                                          name="name"
                                          value="{{ old('name') }}"
                                          required
                                          autofocus />
                        </div>

                        <!-- Start and End Date Fields -->
                        <div class="flex gap-2">
                            <div class="mt-4">
                                <x-input-label for="start_date" :value="__('Start Date')" />
                                <x-date-input id="start_date"
                                              name="start_date"
                                              x-model="startDate"
                                              required />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="end_date" :value="__('End Date')" />
                                <x-date-input id="end_date"
                                              name="end_date"
                                              x-model="endDate"
                                              required />
                            </div>
                        </div>

                        <!-- Location Field -->
                        <div class="mt-4">
                            <x-input-label for="location" :value="__('Location')" />
                            <x-text-input id="location"
                                          class="block mt-1 w-full"
                                          type="text"
                                          name="location"
                                          value="{{ old('location') }}"
                                          required />
                        </div>

                        <!-- Description Field -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-trix-input id="description"
                                          name="description"
                                          value="{{ old('description') }}" />
                        </div>

                        <!-- Banner File Upload -->
                        <div class="mt-4">
                            <x-input-label for="banner" :value="__('Add a banner, will be shown on the event details page')" />
                            <input id="banner"
                                   class="block mt-1 w-full"
                                   type="file"
                                   name="banner"
                                   accept="image/*">
                        </div>

                        <!-- Icon File Upload -->
                        <div class="mt-4">
                            <x-input-label for="icon" :value="__('Add a small picture for the calendar (should be square)')" />
                            <input id="icon"
                                   class="block mt-1 w-full"
                                   type="file"
                                   name="icon"
                                   accept="image/*">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
