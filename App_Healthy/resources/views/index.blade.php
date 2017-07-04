@extends('layouts.app')
@section('content')

	<div class="con_left_index">
			
			<table>
				<tr>
					<td>Welcome {{session()->get('Admin_id')}}</td>

				</tr>
				<tr>
					<td>Web Server of Healthy Systems </td>
				</tr>
			</table>
			
	</div>

@endsection
		