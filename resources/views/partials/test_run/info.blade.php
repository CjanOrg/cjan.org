<div class='test_run col-md-4'>
<!--<h5>{{ $testRun['created_at'] }}</h5>-->
@if ($testRun['status_id'] == 1)
<span class="glyphicon glyphicon-ok" aria-hidden="true" style='color: green'></span>
@elseif ($testRun['status_id'] == 2)
<span class="glyphicon glyphicon-remove" aria-hidden="true" style='color: red'></span>
@elseif ($testRun['status_id'] == 3)
<span class="glyphicon glyphicon-flag" aria-hidden="true" style='color: yellow'></span>
@else
<span class="glyphicon glyphicon-question-sign" aria-hidden="true" style='color: gray'></span>
@endif
<ul>
<li>JVM: {{ $testRun['java_version']['java_vendor']['name'] }}-{{ $testRun['java_version']['name'] }}</li>
<li>TZ: {{ $testRun['timezone'] }}</li>
<li>Locale: {{ $testRun['locale'] }}</li>
<li>Platform Encoding: {{ $testRun['platform_encoding'] }}</li>
<li>Created: {{ $testRun['created_at'] }}</li>
</ul>

</div>