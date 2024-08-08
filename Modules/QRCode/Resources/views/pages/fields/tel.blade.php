<div class="col-md-12">
    <label for="mobile" class="my-3">
       Mobil
        <span class="text-danger">*</span>
    </label>
    <div class="input-group" style="margin-top:-4px">
        <select class="form-select w-25" data-live-search="true" id="country_phonecode" name="country_phonecode">
            @foreach (get_countries() as $item)
                <option value="{{ $item->phonecode }}">
                    {!! $item->countryCode() !!}
                </option>
            @endforeach
        </select>
        <input type="tel" class="form-control height-35 f-14" placeholder="Örn 0535351131" name="mobile" id="mobile" value="{{ $formFields['mobile'] ?? '' }}">
    </div>
</div>
