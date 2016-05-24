<div class="table-responsive">
   <table class="table table-bordered table-striped table-hover">
		 <tr>
			<td class="col-md-3" >{!! Form::label('id', 'ID:') !!}</td>
			<td>{!! $member->id !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('membershiptype', 'Membership Type:') !!}</td>
			<td>{!! $member->membershiptype !!}</td>
		</tr>  
		 <tr>
			<td class="col-md-3" >{!! Form::label('firstname', 'First Name:') !!}</td>
			<td>{!! $member->firstname !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('lastname', 'Last Name:') !!}</td>
			<td>{!! $member->lastname !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('middlename', 'Middle Name:') !!}</td>
			<td>{!! $member->middlename !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('emailaddress', 'Email Address:') !!}</td>
			<td>{!! $member->emailaddress !!}</td>
		</tr>  
		 <tr>
			<td class="col-md-3" >{!! Form::label('id', 'Cellphone Number:') !!}</td>
			<td>{!! $member->cellphonenumber !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('residenceaddress', 'Residence Address:') !!}</td>
			<td>{!! $member->residenceaddress !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('residencetelephoneno', 'Residence Telephone Number:') !!}</td>
			<td>{!! $member->residencetelephoneno !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('residencefaxno', 'Residence Fax Number:') !!}</td>
			<td>{!! $member->residencefaxno !!}</td>
		</tr>  
		 <tr>
			<td class="col-md-3" >{!! Form::label('officeaddress', 'Office Address:') !!}</td>
			<td>{!! $member->officeaddress !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('officetelephoneno', 'Office Telephone Number:') !!}</td>
			<td>{!! $member->officetelephoneno !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('officefaxno', 'Office Fax Number:') !!}</td>
			<td>{!! $member->officefaxno !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('nameandaddressofcompany', 'Name And Address Of Company:') !!}</td>
			<td>{!! $member->nameandaddressofcompany !!}</td>
		</tr>  
		 <tr>
			<td class="col-md-3" >{!! Form::label('profession', 'Profession:') !!}</td>
			<td>{!! $member->profession !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('companyposition', 'Company Position:') !!}</td>
			<td>{!! $member->companyposition !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('gender', 'Gender:') !!}</td>
			<td>{!! $member->gender !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('status', 'Status:') !!}</td>
			<td>{!! $member->status !!}</td>
		</tr>  
		 <tr>
			<td class="col-md-3" >{!! Form::label('religion', 'Religion:') !!}</td>
			<td>{!! $member->religion !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('birthdate', 'Birthday:') !!}</td>
			<td>{!! $member->birthdate !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('placeofbirth', 'Place Of Birth:') !!}</td>
			<td>{!! $member->placeofbirth !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('elementaryschool', 'Elementary School:') !!}</td>
			<td>{!! $member->elementaryschool !!}</td>
		</tr>  
		 <tr>
			<td class="col-md-3" >{!! Form::label('elementaryyeargrad', 'Year Graduated in Elementary:') !!}</td>
			<td>{!! $member->elementaryyeargrad !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('collegeschool', 'College School:') !!}</td>
			<td>{!! $member->collegeschool !!}</td>
		</tr> 
		<td class="col-md-3" >{!! Form::label('coursetaken', 'Course Taken:') !!}</td>
			<td>{!! $member->coursetaken !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('collegeyeargraduated', 'Year Graduated in College:') !!}</td>
			<td>{!! $member->collegeyeargraduated !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('memberstatus', 'Member Status:') !!}</td>
			<td>{!! $member->memberstatus !!}</td>
		</tr>  
		 <tr>
			<td class="col-md-3" >{!! Form::label('lomhighestposition', 'LOM Highest Position:') !!}</td>
			<td>{!! $member->lomhighestposition !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('lomhighestpositionyear', 'LOM Highest Position Year:') !!}</td>
			<td>{!! $member->lomhighestpositionyear !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('lomawardsrecieved', 'LOM Awards Recieved:') !!}</td>
			<td>{!! $member->lomawardsrecieved !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('areahighestposition', 'Area Highest Position:') !!}</td>
			<td>{!! $member->areahighestposition !!}</td>
		</tr>  
		 <tr>
			<td class="col-md-3" >{!! Form::label('areahighestpositionyear', 'Area Highest Position Year:') !!}</td>
			<td>{!! $member->areahighestpositionyear !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('regionalhighestposition', 'Regional Highest Position:') !!}</td>
			<td>{!! $member->regionalhighestposition !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('regionalhighestpositionyear', 'Regional Highest Position Year:') !!}</td>
			<td>{!! $member->regionalhighestpositionyear !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('regionalawardsrecieved', 'Regional Awards Recieved:') !!}</td>
			<td>{!! $member->regionalawardsrecieved !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('highestjcinternationalposition', 'Highest JC International Position:') !!}</td>
			<td>{!! $member->highestjcinternationalposition !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('highestjcinternationalpositionyear', 'Highest JC International Position Year:') !!}</td>
			<td>{!! $member->highestjcinternationalpositionyear !!}</td>
		</tr>  
		 <tr>
			<td class="col-md-3" >{!! Form::label('internationalawardsrecieved', 'International Awards Recieved:') !!}</td>
			<td>{!! $member->internationalawardsrecieved !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('jcisenatorialno', 'JCI Senatorial No:') !!}</td>
			<td>{!! $member->jcisenatorialno !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('dateofinduction', 'Date Of Induction:') !!}</td>
			<td>{!! $member->dateofinduction !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('membersince', 'Member Since:') !!}</td>
			<td>{!! $member->id !!}</td>
		</tr> 
		<tr>
			<td class="col-md-3" >{!! Form::label('created_at', 'Created At:') !!}</td>
			<td>{!! $member->created_at !!}</td>
		</tr>  
		<td class="col-md-3" >{!! Form::label('updated_at', 'Updated At:') !!}</td>
			<td>{!! $member->updated_at !!}</td>
		</tr>
	</table>
</div>	
		  