<div class="d-block mt-3">
    <div class="image-input image-input-outline" data-kt-image-input="true"
         style="background-image: url('/images/placeholder.jpg')">
        <div class="image-input-wrapper w-125px h-125px bgi-position-center bgi-size-cover"
             style="background-image: url('{{$url??'/images/placeholder.jpg'}}')"></div>

        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
               data-kt-image-input-action="change" data-bs-toggle="tooltip"
               title="{{$url?__('Change Thumbnail'):__('Add Thumbnail')}}">
            <i class="bi bi-pencil-fill fs-7"></i>
            <input type="file" name="thumbnail" accept="image/*" value="{{old('thumbnail')}}"/>
            <input type="hidden" name="thumbnail_remove"/>
        </label>

        <div class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
             data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{__('Cancel')}}">
            <i class="bi bi-x fs-2"></i>
        </div>

        <div
            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow remove-thumbnail"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{__('Remove')}}">
            <i class="bi bi-x fs-2"></i>
        </div>
    </div>

    @error('thumbnail')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
</div>
