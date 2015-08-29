<div class="version-filter well">
  <form class="form-inline">
    <div class="form-group">
      <label for="status_filter">Status</label>
      <select id="status_filter" name="status_filter">
        <option value="">All</option>
      @foreach ($statuses as $status)
        @if ($statusFilter == $status['id'])
        <option selected='selected' value="{{ $status['id'] }}">{{ $status['name'] }}</option>
        @else
        <option value="{{ $status['id'] }}">{{ $status['name'] }}</option>
        @endif
      @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-default">Filter</button>
  </form>
</div>