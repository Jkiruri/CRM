@extends('app')

@section('content')
    <div class="grid grid-cols-12 sm:gap-6">
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-label" class="form-label">Basic Input</label>
        <input type="text" class="form-control" id="input">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-label" class="form-label">Form Input With Label</label>
        <input type="text" class="form-control" id="input-label">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-placeholder" class="form-label">Form Input With Placeholder</label>
        <input type="text" class="form-control" id="input-placeholder" placeholder="Placeholder">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-text" class="form-label">Type Text</label>
        <input type="text" class="form-control" id="input-text" placeholder="Text">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-number" class="form-label">Type Number</label>
        <input type="number" class="form-control" id="input-number" placeholder="Number">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-password" class="form-label">Type Password</label>
        <input type="password" class="form-control" id="input-password" placeholder="Password">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-email" class="form-label">Type Email</label>
        <input type="email" class="form-control" id="input-email" placeholder="Email@xyz.com">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-tel" class="form-label">Type Tel</label>
        <input type="tel" class="form-control" id="input-tel" placeholder="+1100-2031-1233">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-date" class="form-label">Type Date</label>
        <input type="date" class="form-control" id="input-date">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-week" class="form-label">Type Week</label>
        <input type="week" class="form-control" id="input-week">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-month" class="form-label">Type Month</label>
        <input type="month" class="form-control" id="input-month">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-time" class="form-label">Type Time</label>
        <input type="time" class="form-control" id="input-time">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-datetime-local" class="form-label">Type datetime-local</label>
        <input type="datetime-local" class="form-control" id="input-datetime-local">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-search" class="form-label">Type Search</label>
        <input type="search" class="form-control" id="input-search" placeholder="Search">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-submit" class="form-label">Type Submit</label>
        <input type="submit" class="form-control ti-btn" id="input-submit" value="Submit">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-reset" class="form-label">Type Reset</label>
        <input type="reset" class="form-control ti-btn" id="input-reset">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-button" class="form-label">Type Button</label>
        <input type="button" class="form-control ti-btn !text-white !bg-primary" id="input-button"  value="Button">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <div class="grid grid-cols-12 gap-6">
            <div class="xl:col-span-3 col-span-12 flex flex-col ">
                <label class="form-label">Type Color</label>
                <input class="form-control form-input-color !rounded-md" type="color" value="#136bd0">
            </div>
            <div class="xl:col-span-5 col-span-12">
                <div class="form-check">
                    <p class="mb-3 px-0 text-muted">Type Checkbox</p>
                    <input class="form-check-input ms-2" type="checkbox" value="" checked>
                </div>
            </div>
            <div class="xl:col-span-4 col-span-12">
                <div class="form-check">
                    <p class="mb-4 px-0 text-muted">Type Radio</p>
                    <input class="form-check-input ms-2" type="radio" checked>
                </div>
            </div>
        </div>
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <div>
            <label for="file-input" class="sr-only">Type file</label>
            <input type="file" name="file-input" id="file-input" class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10
            file:bg-transparent file:border-0
            file:bg-gray-200 file:me-4
            file:py-3 file:px-4
            dark:file:bg-black/20 dark:file:text-white/50">
          </div>
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label class="form-label">Type Url</label>
        <input class="form-control" type="url"  name="website" placeholder="http://example.com">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-disabled" class="form-label">Type Disabled</label>
        <input type="text" id="input-disabled" class="form-control" placeholder="Disabled input" disabled>
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-readonlytext" class="form-label">Input Readonly Text</label>
        <input type="text" readonly class="form-control-plaintext" id="input-readonlytext" value="email@example.com">
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="disabled-readonlytext" class="form-label">Disabled Readonly Input</label>
        <input class="form-control" type="text" value="Disabled readonly input" id="disabled-readonlytext" aria-label="Disabled input example" disabled readonly>
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label class="form-label">Type Readonly Input</label>
        <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="text-area" class="form-label">Textarea</label>
        <textarea class="form-control" id="text-area" rows="1"></textarea>
    </div>
    <div class="xl:col-span-4 lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
        <label for="input-DataList" class="form-label">Datalist example</label>
        <input class="form-control" type="text" list="datalistOptions" id="input-DataList" placeholder="Type to search...">
        <datalist id="datalistOptions">
            <option value="San Francisco">
            </option>
            <option value="New York">
            </option>
            <option value="Seattle">
            </option>
            <option value="Los Angeles">
            </option>
            <option value="Chicago">
            </option>
        </datalist>
    </div>
</div>
@endsection