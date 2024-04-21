@extends('admin.layout.navside')

@section('title', 'Ajouter client')

@section('content')


<div class="p-4 bg-white  ">
    <!-- Stepper -->
    <div data-hs-stepper="">
      <!-- Stepper Nav -->
      <ul class="relative flex flex-row gap-x-2">
        <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{
          "index": 1
        }'>
          <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
            <span class="size-7 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-blue-600 hs-stepper-active:text-white hs-stepper-success:bg-blue-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
              <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">1</span>
              <svg class="hidden flex-shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </span>
            <span class="ms-2 text-sm font-medium text-gray-800">
              Information personnel
            </span>
          </span>
          <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-blue-600 hs-stepper-completed:bg-teal-600">
            
          </div>
        </li>
  
        <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{
          "index": 2
        }'>
          <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
            <span class="size-7 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-blue-600 hs-stepper-active:text-white hs-stepper-success:bg-blue-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
              <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">2</span>
              <svg class="hidden flex-shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </span>
            <span class="ms-2 text-sm font-medium text-gray-800">
              Step
            </span>
          </span>
          <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-blue-600 hs-stepper-completed:bg-teal-600"></div>
        </li>
  
        <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{
            "index": 3
          }'>
          <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
            <span class="size-7 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-blue-600 hs-stepper-active:text-white hs-stepper-success:bg-blue-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
              <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">3</span>
              <svg class="hidden flex-shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </span>
            <span class="ms-2 text-sm font-medium text-gray-800">
              Step
            </span>
          </span>
          <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-blue-600 hs-stepper-completed:bg-teal-600"></div>
        </li>

        <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{
            "index": 4
          }'>
          <span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle">
            <span class="size-7 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-blue-600 hs-stepper-active:text-white hs-stepper-success:bg-blue-600 hs-stepper-success:text-white hs-stepper-completed:bg-teal-500 hs-stepper-completed:group-focus:bg-teal-600">
              <span class="hs-stepper-success:hidden hs-stepper-completed:hidden">4</span>
              <svg class="hidden flex-shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </span>
            <span class="ms-2 text-sm font-medium text-gray-800">
              Step
            </span>
          </span>
          <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-blue-600 hs-stepper-completed:bg-teal-600"></div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End Stepper Nav -->
  
      <!-- Stepper Content -->
      <div class="mt-5 sm:mt-8">
        <!-- First Contnet -->
        <div data-hs-stepper-content-item='{
          "index": 1
        }'>
        <div class="p-4 bg-gray-50 flex flex-col justify-center items-center border border-dashed border-gray-200 rounded-xl h-full">
            <input type="text" class="py-3 px-4 mb-2 block w-full lg:w-1/2  border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" name="name" placeholder="Nom ou raison sociale">
            <input type="text" class="py-3 px-4 mb-2 block w-full lg:w-1/2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" name="last-name" placeholder="Prénom">
            <input type="text" class="py-3 px-4 mb-2 block w-full lg:w-1/2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" name="username" placeholder="Nom d'utlisateur">
            <input type="text" class="py-3 px-4 mb-2 block w-full lg:w-1/2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" name="password" placeholder="Mot de passe">
            <input type="text" class="py-3 px-4 mb-2 block w-full lg:w-1/2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" name="repeat-password" placeholder="Confirmer mot de passe">
            
        </div>
        
        </div>
        <!-- End First Contnet -->
  
        <!-- First Contnet -->
        <div data-hs-stepper-content-item='{
          "index": 2
        }' style="display: none;">
          <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
            <h3 class="text-gray-500">
              Second content
            </h3>
          </div>
        </div>
        <!-- End First Contnet -->
  
        <!-- First Contnet -->
        <div data-hs-stepper-content-item='{
          "index": 3
        }' style="display: none;">
          <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
            <h3 class="text-gray-500">
              Third content
            </h3>
          </div>
        </div>

        <!-- First Contnet -->
        <div data-hs-stepper-content-item='{
            "index": 4
          }' style="display: none;">
            <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
              <h3 class="text-gray-500">
                forthe content
              </h3>
            </div>
          </div>
        <!-- End First Contnet -->
  
        <!-- Final Contnet -->
        <div data-hs-stepper-content-item='{
          "isFinal": true
        }' style="display: none;">
          <div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
            <h3 class="text-gray-500">
              Final content
            </h3>
          </div>
        </div>
        <!-- End Final Contnet -->
  
        <!-- Button Group -->
        <div class="mt-5 flex justify-between items-center gap-x-2">
          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-back-btn="">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m15 18-6-6 6-6"></path>
            </svg>
            Retour
          </button>
          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-next-btn="">
            Suivant
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m9 18 6-6-6-6"></path>
            </svg>
          </button>
          <button type="button" class=" py-2 px-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-finish-btn="" style="display: none;">
            Terminé
          </button>
          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-reset-btn="" style="display: none;">
            Reinitialisé
          </button>
        </div>
        <!-- End Button Group -->
      </div>
      <!-- End Stepper Content -->
    </div>
    <!-- End Stepper -->
  </div>


@endsection