<div>
   {{-- Attribute & Options --}}
   <div>
      <div>
         <h3 class="accordion-header">
            <a class="accordion-button"
               href="#product-price-calculator"
               role="button"
               data-bs-toggle="collapse"
               aria-expanded="true"
               aria-controls="product-price-calculator">
               {{ __('Price calculator') }}
            </a>
         </h3>
         <div class="accordion-collapse collapse show"
            id="product-price-calculator"
            data-bs-parent="#productPanels">
            <div class="accordion-body">
               <form method="post">
                  <div class="row">
                     <div class="col-md-12 mb-4">
                        <div class="d-flex justify-content-between align-items-center pb-1">
                           <label class="form-label">{{ __('Quantity') }}</label>
                        </div>
                        @if ($product->allowed_quantities)
                           <select wire:model="selectedQuantityValue"
                              class="form-select"
                              required>
                              @foreach ($product->allowed_quantities as $quantity)
                                 <option value="{{ $quantity['value'] }}">
                                    {{ $quantity['value'] }}</option>
                              @endforeach
                           </select>
                        @endif
                     </div>
                     @foreach ($product->attributs as $attribute)
                        <div class="col-md-6 mb-4">
                           <div class="d-flex justify-content-between align-items-center pb-1">
                              <label class="form-label">{{ $attribute->label }}:</label>
                           </div>
                           <select wire:model="selectedOptions.{{ $attribute->name }}"
                              class="form-select"
                              required>
                              @foreach ($attribute->pivot->options as $option)
                                 <option value="{{ $option['ref'] }}">{{ $option['name'] }}
                                 </option>
                              @endforeach
                           </select>
                        </div>
                     @endforeach
                     @if (!$editMode)
                        <div class="col-md-12">
                           <div class="form-check mt-4">
                              <input wire:model="designByCompany"
                                 type="checkbox"
                                 class="form-check-input"
                                 id="design-by-company">
                              <label class="form-label"
                                 for="design-by-company">{{ __('Do you want us to do the design ?') }}</label>
                           </div>
                        </div>
                     @endif
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <hr class="mx-2 mb-4 mt-2">
   {{-- Prices & Buttons --}}
   <div class="px-3">
      <div class="d-flex justify-content-between">
         <div class="mb-4">
            <h5>{{ __('Total price') }} :
               <span>{{ formatPrice($totalPrice) }} Dhs HT </span>
            </h5>
            <h6 class="fs-sm text-danger">{{ __('Unit price') }} :
               <span>{{ formatPrice($unitPrice) }} Dhs HT</span>
            </h6>
         </div>
         <div wire:loading
            wire:target="selectedOptions, selectedQuantityValue, designByCompany"
            class="spinner-border text-accent">
         </div>
      </div>
      <div>
         @if ($editMode)
            <x-base.alerts />
            <button wire:click="handleSubmit"
               wire:target="handleSubmit"
               wire:loading.attr="disabled"
               type="button"
               class="btn btn-success submit-button w-100 mb-2">
               <span wire:target="handleSubmit"
                  wire:loading
                  class="spinner-border spinner-border-sm me-2">
               </span>
               <i wire:target="handleSubmit"
                  wire:loading.remove
                  class="ci-check fs-lg me-2"></i>
               {{ __('Update cart item') }}
            </button>
         @endif
         @if ($designByCompany)
            <button data-bs-toggle="modal"
               data-bs-target="#price-calculator-files-upload-modal"
               class="btn btn-accent w-100"
               type="submit">
               <i class="ci-edit fs-lg me-2"></i>
               {{ __('Design information') }}
            </button>
         @else
            <button data-bs-toggle="modal"
               data-bs-target="#price-calculator-files-upload-modal"
               class="btn btn-primary w-100"
               type="submit">
               <i class="ci-upload fs-lg me-2"></i>
               {{ __('Transfer your files') }}
            </button>
         @endif
      </div>
   </div>

   {{-- Files upload modal --}}
   <div wire:ignore.self
      class="modal fade"
      id="price-calculator-files-upload-modal"
      tabindex="-1"
      aria-labelledby="price-calculator-files-upload-modal-label"
      aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"
                  id="price-calculator-files-upload-modal-label">
                  {{ $designByCompany ? __('Design information') : __('Transfer your files') }}
               </h5>
               <button type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
            </div>
            <div x-data="{ isUploading: false, progress: 0 , }"
               x-on:livewire-upload-start="isUploading = true"
               x-on:livewire-upload-finish="isUploading = false ; progress = 0"
               x-on:livewire-upload-error="isUploading = false ; progress = 0"
               x-on:livewire-upload-progress="progress = $event.detail.progress"
               class="modal-body has-cool-scrollbar">
               <div class="alert alert-info d-flex"
                  role="alert">
                  <div class="alert-icon">
                     <i class="ci-announcement"></i>
                  </div>
                  <div>
                     {{ __('The files should not exceed 10mb each. and they should be jpg, jpeg, gif, png, eps, ai, svg, pdf, zip, tar, rar, cdr, psd') }}
                  </div>
               </div>
               {{-- Old media --}}
               @if ($editMode && count($oldMedia))
                  <div wire:loading.class="disabled-element"
                     wire:target="deleteOldMediaItemLocally"
                     class="px-3 py-3 border border-1 rounded-3">
                     <div wire:loading
                        wire:target="deleteOldMediaItemLocally"
                        class="spinner-grow center-loader"
                        role="status">
                     </div>
                     <h5 class="mb-4">{{ __('Old files') }}</h5>
                     @foreach ($oldMedia as $mediaItem)
                        <div class="mb-3">
                           @if (!is_numeric($mediaItem->name))
                              <p class="h6 mb-3 text-capitalize">{{ $mediaItem->name }}</p>
                           @endif
                           <div class="position-relative d-inline-block">
                              <button
                                 wire:click="deleteOldMediaItemLocally({{ $mediaItem->id }})"
                                 class="btn btn-link position-absolute top-0 start-100 translate-middle">
                                 <i
                                    class="ci ci-trash bg-danger p-2 fs-xs text-white rounded-circle">
                                 </i>
                              </button>
                              @if (file_is_image($mediaItem->filename))
                                 <img width="120"
                                    height="120"
                                    class="rounded-3"
                                    src="{{ $mediaItem->public_path }}"
                                    alt="{{ $mediaItem->filename }}">
                              @else
                                 <x-base.nofilepreview />
                              @endif
                           </div>
                           <p class="mt-3">
                              <a href="{{ $mediaItem->public_path }}"
                                 target="_blank"
                                 rel="noopener"
                                 class="text-info text-wrap text-break">
                                 {{ $mediaItem->filename }}
                              </a>
                           </p>
                        </div>
                        @if (!$loop->last) <hr class="my-3"> @endif
                     @endforeach
                  </div>
                  <h5 class="mb-4 mt-4 px-1">{{ __('New files') }}</h5>
               @endif

               <x-base.upload-progress />
               <x-base.alerts />

               {{-- New Files (requiredFiles / designFiles) --}}
               @if ($designByCompany)
                  <div class="form-floating">
                     <textarea wire:model.debounce.500ms="designInformation"
                        class="form-control"
                        id="fl-textarea"
                        style="height: 120px;"
                        placeholder="{{ __('Enter the design information (ex: brand name, contact info ...)') }}"></textarea>
                     <label
                        for="fl-textarea">{{ __('Enter the design information (ex: brand name, contact info ...)') }}</label>
                  </div>
                  <div class="file-drop-area mt-3">
                     @if (!$designFiles)
                        <div class="file-drop-icon ci-cloud-upload"></div>
                        <span class="file-drop-message">
                           {{ __('upload your logo or any needed file (max : 5)') }}
                        </span>
                     @endif
                     @foreach ($designFiles as $index => $file)
                        @if (file_is_image($file))
                           <div class="file-drop-preview img-thumbnail rounded">
                              <img src="{{ $file->temporaryUrl() }}"
                                 alt="{{ $file->getClientOriginalName() }}">
                           </div>
                        @else
                           <div class="file-drop-icon ci-document"></div>
                        @endif
                        <span class="file-drop-message">
                           {{ $file->getClientOriginalName() }}
                        </span>
                     @endforeach
                     <input type="file"
                        multiple
                        wire:model="designFiles"
                        id="design-files"
                        class="file-drop-input">
                     <button onclick="document.querySelector('#design-files').click()"
                        type="button"
                        class="btn btn-accent btn-sm">
                        {{ __('Select your files') }}</button>
                  </div>
               @else
                  @foreach ($requiredFiles as $requiredFileName => $file)
                     <div wire:key="{{ $loop->index }}"
                        class="file-drop-area mt-3">
                        @if ($file)
                           @if (file_is_image($file))
                              <div class="file-drop-preview img-thumbnail rounded">
                                 <img src="{{ $file->temporaryUrl() }}"
                                    alt="{{ $file->getClientOriginalName() }}">
                              </div>
                           @else
                              <div class="file-drop-icon ci-document"></div>
                           @endif
                        @else
                           <div class="file-drop-icon ci-cloud-upload"></div>
                        @endif
                        <span class="file-drop-message">
                           @if ($file)
                              {{ $file->getClientOriginalName() }}
                           @else
                              {{ __('Drag and drop here to upload') }}
                           @endif
                        </span>
                        <input type="file"
                           wire:model="requiredFiles.{{ $requiredFileName }}"
                           class="file-drop-input"
                           id="files-{{ $requiredFileName }}">
                        <button type="button"
                           onclick="document.querySelector('#files-{{ $requiredFileName }}').click()"
                           class="btn btn-accent btn-sm">
                           {{ __('Select your :filename file', ['filename' => $requiredFileName]) }}</button>
                     </div>
                  @endforeach

               @endif
            </div>
            <div class="modal-footer justify-content-between">
               <small class="fs-sm float-left mb-3">
                  <a href="#">{{ __('Contact us') }}</a>
                  {{ __('if your files do not meet our requirements') }}
               </small>
               <button wire:click="handleSubmit"
                  wire:target="handleSubmit"
                  wire:loading.attr="disabled"
                  type="button"
                  class="btn btn-primary submit-button">
                  <span wire:target="handleSubmit"
                     wire:loading
                     class="spinner-border spinner-border-sm me-2">
                  </span>
                  {{ $editMode ? __('Update cart item') : __('Transfer and add to cart') }}
               </button>
            </div>
         </div>
      </div>
   </div>

</div>