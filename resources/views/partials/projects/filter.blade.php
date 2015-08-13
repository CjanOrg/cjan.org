<div class="version-filter well">
  <form class="form-inline">
    <div class="form-group">
      <label for="version_filter">Version</label>
      <input type="text" class="form-control" id="version_filter" name="version_filter" value="{{ $version_filter }}" placeholder="">
    </div>
    <div class="checkbox">
      <label>
        @if (isset($snapshot_filter) and $snapshot_filter == 'on')
        <input type="checkbox" name="snapshot_filter" checked="checked"> Ignore SNAPSHOTs?
        @else
        <input type="checkbox" name="snapshot_filter"> Ignore SNAPSHOTs?
        @endif
      </label>
    </div>
    <button type="submit" class="btn btn-default">Filter</button>
  </form>
</div>