<input name="end_date_time" class="form-control" type="date" placeholder="End date"
       min="{{ isset($start_date) ? date('Y-m-d', strtotime($start_date . ' +1 day')) : '' }}"
       value="{{ isset($edit_id) ? date('Y-m-d', strtotime($edit_rs['end_date_time'])) : (isset($start_date) ? date('Y-m-d', strtotime($start_date . ' +1 day')) : '') }}"
       @if(isset($edit_id)) readonly style="background-color:#fcf8e3;"
    @endif>
