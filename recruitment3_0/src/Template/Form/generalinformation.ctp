<?php   echo $this->Html->css('jquery-ui.min');
        echo $this->Html->script('jquery-ui.min'); ?>
<div>
<table width="650px" style="table-layout: fixed; margin: 0 auto;">
<tr>
    <td width="20%"></td>
    <td width="50%"><span class="generalinfoheader">Advertisement</span>
    <br/>
	Newspaper Advertisement: <a href="<?php echo $this->webroot . '/files/IMG-20180630-WA0003.jpg'; ?>" target="_blank">Click Here</a>
	<br/>
	General Information and Instructions: <a href="<?php echo $this->webroot . '/files/Updated vacancy details -Teaching.pdf'; ?>" target="_blank">Click Here</a>
	<br/>For Addendum: <a href="<?php echo $this->webroot . '/files/Addendum 2018.pdf'; ?>" target="_blank">click here</a>
	<br/>For Corrigendum: <a href="<?php echo $this->webroot . '/files/Corrigendum regarding Economics Studies 2018.pdf'; ?>" target="_blank">click here</a>
	<!--<br/>For Corrigendum II: <a href="<?php echo $this->webroot . '/files/CGDM 2.jpg'; ?>" target="_blank">click here</a>
    <br/>For Proposal to establish Baba Ram Singh Chair dedicated to the founder of Namdhari movement in India: <a href="<?php echo $this->webroot . '/files/Proposal Baba Sat Guru ram Singh Chair.pdf'; ?>" target="_blank">click here</a>
    <br/>For Proposal for Sh. Guru Gobind Singh Chair for The Comparative Study of Religions and Cultures: <a href="<?php echo $this->webroot . '/files/Shri Guru Gobind Singh Chair.pdf'; ?>" target="_blank">click here</a>
    <br/>For Chair Professor – Baba Satguru Ram Singh Chair, General Instructions and Essential Information: <a href="<?php echo $this->webroot . '/files/Chair Professor Baba Satguru Ram Singh Chair (2) copy.rtf'; ?>" target="_blank">click here</a>
    <br/>For Chair Professor – SHRI GURU GOBIND SINGH CHAIR, General Instructions and Essential Information: <a href="<?php echo $this->webroot . '/files/details chair GGS Copy.rtf'; ?>" target="_blank">click here</a>
    <br/>For Screening Criteria (To be filled and attached with hard copy of Application Form): <a href="<?php echo $this->webroot . '/files/Selection Criteria.pdf'; ?>">click here</a>
    <br/>For API Proforma (To be filled and uploaded. MS Word format): <a href="<?php echo $this->webroot . '/files/Revised_API_Performa.doc'; ?>">click here</a>-->
    <!--<?php /*if(isset($final_subimt) && $final_subimt == "1") { ?>
    <br/>For Uploading new API Proforma: <a href="<?php echo $this->webroot . 'uploadproforma/upload'; ?>">click here</a>
    <?php }*/ ?>
    <br/>--></td>
    <!--<td width="30%"><span class="generalinfoheader">Educational Qualifications</span></td>
    <td width="20%"><span class="generalinfoheader">Advertisement</span></td>-->
    <td><?php if(!empty($this->Session->read('admin')) && $this->Session->read('admin') == "1") { ?> For Reports: <a href="javascript: showReports();" target="_blank">click here</a> <?php } ?></td>
</tr>
<tr>
    <td></td>
    <td><span class="generalinfoheader">Educational Qualifications</span>
    <br/>Essential Qualifications   for Professors, Associate Professors, and Assistant Professors: <br/>
         As per <a href="http://www.ugc.ac.in/oldpdf/regulations/revised_finalugcregulationfinal10.pdf" target="_blank">“UGC regulations on minimum qualifications for appointment of teachers and other academic staff in universities and colleges and measures for the maintenance of standards in higher education 2010“</a> 
        <br/>and 
        <br/><a href="http://ugc.ac.in/UGC_Regulations.aspx" target="_blank">amendments I,II,III and IV</a> and University rules.
        <br/>
        <a href="http://ncte-india.org/regulation2014/english/appendix5.pdf" target="_blank">NCTE Regulation 2014</a>
    <br/></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td width="60%"><span class="generalinfoheader">General Information</span></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>The fee for SC/ST/PWD applicants is nil and for others the fee is Rs. 750.
        <br/>
        <label style="font-weight: bold; color: red;">The last date of online application form is 03<sup>rd</sup> August, 2018 23:59 hrs</label>
        <br/>
        <label style="font-weight: bold; color: red;">The last date of receiving printouts of the online application along with all supporting documents is 10<sup>th</sup> August, 2018 1700 hrs</label>
    </td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>No column should be left blank.</td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>If the candidate is selected, she/he will be required to submit Aadhaar number within one month of joining.</td>
    <td></td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td>In case of payment failure, the final submission of application will not take place. The candidate will not be able to print the form.</td>
    <td></td>
    <td></td>
</tr>-->
<!--
<tr>
    <td></td>
    <td>If payment fails, it will be automatically refunded to the same account.</td>
    <td></td>
    <td></td>
</tr>-->
<tr>
    <td></td>
    <td>Billing Address is the address of Credit/Debit card holder.</td>
    <td></td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td>
        <span>For detailed qualifications, please <a href="javascript: void(0);" target="_blank">click here</a></span>.
    </td>
    <td></td>
    <td></td>
</tr>-->
<tr>
    <td></td>
    <td><label>I have read the <a href="<?php echo $this->webroot . '/files/Faculty Advt - 2018 (Final).pdf'; ?>">General Conditions to Apply</a> and <a href="<?php echo $this->webroot . '/files/Refund Policy.pdf'; ?>">Payment & Refund Policy</a>: (Tick the box to continue) <span>*</span></label>
    </td>
    <td><input type="checkbox" id="declaration" name="declaration" style="width: 20px; height: 20px;"></input></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">Post Applied For: *</span>
    </td>
    <td><select id="post_applied_for" name="post_applied_for" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="professor">Professor</option>
                <option value="associateprofessor">Associate Professor</option>
                <option value="assistantprofessor">Assistant Professor</option>
            </select></td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">School: *</span>
        (<a href="http://cup.ac.in/schools_centres.php" target="_blank">Details of Schools and Centres</a>)
    </td>
    <td><select id="area" name="area" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="bas">Basic and Applied Sciences</option>
                <option value="edu">Education</option>
                <option value="et">Engineering and Technology</option>
                <option value="ees">Environment and Earth Sciences</option>
                <option value="gr">Global Relations</option>
                <option value="hs">Health Sciences</option>
                <option value="llc">Languages, Literature and Culture</option>
                <option value="lsg">Legal Studies and Governance</option>
                <option value="sps">Sports Sciences</option>
                <option value="ss">Social Sciences</option>
                <option value="bsr">Baba Satguru Ram Singh Chair</option>
            </select></td>
    <td></td>
</tr>
-->
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">Department: *</span>
    </td>
    <td><select id="centre" name="centre" style="width: 100%;">
            <option value="none" selected="selected">None</option>
			<option value='Applied Agriculture (Food Science and Technology)'>Applied Agriculture (Food Science and Technology)</option>
            <option value='Applied Agriculture (Agribusiness)'>Applied Agriculture (Agribusiness)</option>
            <option value='Animal Sciences'>Animal Sciences</option>
            <option value='Chemical Sciences'>Chemical Sciences</option>
            <option value='Computational Sciences'>Computational Sciences</option>
            <option value='Computer Science and Technology'>Computer Science and Technology</option>
            <option value='Economic Studies'>Economic Studies</option>
			<option value='Education'>Education</option>
            <option value='Environmental Sciences and Technology'>Environmental Sciences and Technology</option>
            <option value='Geography and Geology'>Geography and Geology</option>
			<option value='Human Genetics and Molecular Medicine'>Human Genetics and Molecular Medicine</option>
            <option value='Law'>Law</option>
            <option value='Mathematics and Statistics'>Mathematics and Statistics</option>
			<option value='Pharmaceutical Sciences and Natural Products'>Pharmaceutical Sciences and Natural Products</option>
            <option value='Physical Sciences'>Physical Sciences</option>
            <option value='Plant Sciences'>Plant Sciences</option>
            <option value='Sociology'>Sociology</option>
            <option value='South and Central Asian Studies (Including Historical Studies)'>South and Central Asian Studies (Including Historical Studies)</option>
            <option value='Mass Communication and Media Studies'>Mass Communication and Media Studies</option>
            <option value='Financial Administration'>Financial Administration</option>
            <option value='Languages and Comparative Literature'>Languages and Comparative Literature</option>
            <option value='Department of Hindi'>Department of Hindi</option>

            <?php /*
                <!--<option value="Baba Satguru Ram Singh Chair">Baba Satguru Ram Singh Chair</option>
                <option value="SHRI GURU GOBIND SINGH CHAIR">SHRI GURU GOBIND SINGH CHAIR</option>-->
                <option value="Applied Agriculture">Applied Agriculture</option>
                <option value="Animal Sciences">Animal Sciences</option>
                <!--<option value="Biochemistry and Microbial Sciences">Biochemistry and Microbial Sciences</option>-->
                <option value="Chemical Sciences">Chemical Sciences</option>
                <!--<option value="Classical and Modern Languages (Punjabi Languages, Literature and Culture, English)">Classical and Modern Languages (Punjabi Languages, Literature and Culture, English)</option>
		<option value="Comparative Literature">Comparative Literature</option>-->
                <option value="Computational Sciences">Computational Sciences</option>
                <option value="Computer Science and Technology">Computer Science & Technology</option>
                <option value="Economic Studies">Economic Studies</option>
		<option value="Education">Education</option>
                <option value="Environmental Sciences and Technology">Environmental Sciences & Technology</option>
		<option value="Geography and Geology">Geography & Geology</option>
                <option value="Human Genetics and Molecular Medicine">Human Genetics and Molecular Medicine</option>
		<option value="Law">Law</option>
                <option value="Mathematics and Statistics">Mathematics & Statistics</option>
                <option value="Pharmaceutical Sciences and Natural Products">Pharmaceutical Sciences and Natural Products</option>
                <option value="Physical Sciences">Physical Sciences</option>
		<option value="Plant Sciences">Plant Sciences</option>
                <option value="Sociology">Sociology</option>
		<option value="South and Central Asian Studies (Including Historical Studies)">South & Central Asian Studies (Including Historical Studies)</option>
		<option value="Mass Communication and Media Studies">Mass Communication and Media Studies</option>
		<!--<option value="Sports Sciences">Sports Sciences</option>-->
		<option value="Financial Administration">Financial Administration</option> */ ?>
            </select></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><div id="post_selected_elig" style="display:none;" class="min_qualification"></div>
    </td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><?php if(isset($postsapplied) && count($postsapplied) === 0) { ?>
        <div style="text-align: center; font-size: 20px;">
        <?php 
              echo $this->Form->create('Temp', array('id' => 'Continue_Form', 'url' => Router::url( '/multi_step_form/wizard/first', true ))); 
              echo $this->Form->submit('Continue to Application Form', array('div' => false, 'id' => 'continue_bt' ));
              echo $this->Form->end(); 
             ?>
        </div>
    <?php } else { ?>
            <div style="text-align: center; font-size: 20px;">
        <?php 
              echo $this->Form->create('Temp', array('id' => 'Continue_Form', 'url' => Router::url( '/multi_step_form/wizard/filldata', true ))); 
              echo $this->Form->submit('Click here to Apply for Another Post', array('div' => false, 'id' => 'continue_bt' ));
              echo $this->Form->end(); 
             ?>
        </div>
    <?php } ?>
    
    </td>
    <td></td>
</tr>
</table>
</div>

<div id="dialog" title="Password">
<form id="pprompt" name="pprompt" method="post" action="<?php echo $this->webroot; ?>reports/index">
  <input name="password" type="password" size="25" />
</form>
</div>
<script>
    var currentForm;
    $(function() {
        $( "#dialog" ).dialog({
            resizable: false,
            height: 240,
            modal: true,
            autoOpen: false,
            buttons: {
                'Submit': function() {
                    $(this).dialog('close');
                    currentForm.submit();
                    
                },
                Cancel: function() {
                    $(this).dialog('close');
                }
            }
        });
    });
    function showReports() {
        currentForm = $('#pprompt');
        //currentForm.submit();
        $( "#dialog" ).dialog('open');
    }
    
    $(document).ready(function() {
        $('#post_applied_for').val('none');
        $('#area').val('none');
        $('#centre').val('none');
        //$('#continue_bt').prop('disabled', true);
        $('#declaration').prop('checked', false);

        $('#area, #post_applied_for, #declaration, #centre').on('change', function() {
            if($('#post_applied_for').val() === 'none' || $('#area').val() === 'none' || 
                $('#declaration').is(':checked') == false || $('#centre').val() === 'none') {
                    $('#post_selected_elig').css("display","none");
                    //$('#continue_bt').prop('disabled',true);
            }
            else {
                $('#post_selected_elig').empty();
                $('#post_selected_elig').append($('#' + $('#post_applied_for').val() + 
                                                '_' + $('#area').val()).clone().css('display','block'));
                $('#post_selected_elig').css("display","block");
                //$('#continue_bt').prop('disabled', false);
            }
        });

        $('#continue_bt').on('click', function(e){
            if($('#post_applied_for').find(":selected").val() === 'none' || 
                $('#area').find(":selected").val() === 'none' || $('#centre').find(":selected").val() === 'none'
                || $('#declaration').is(':checked') == false) {
                e.preventDefault();
                alert('Please select General Conditions to Apply (Tick Box), Post Applied For, School and Centre to continue.');
            }
            else {
                e.preventDefault();
                //window.location.href = '<?php echo $this->webroot; ?>multi_step_form/wizard/first?post=' + 
                //                $('#post_applied_for').find(":selected").text() + '&area=' + 
                //                $('#area').find(":selected").text() + '&centre=' +
                //                $('#centre').find(":selected").text();
                
                <?php if(isset($postsapplied) && count($postsapplied) === 0) { ?>
                    window.location.href = '<?php echo $this->webroot; ?>multi_step_form/wizard/first?post=' + 
                                $('#post_applied_for').find(":selected").text() + '&centre=' +
                                $('#centre').find(":selected").val();
                <?php } else { ?>
                    window.location.href = '<?php echo $this->webroot; ?>multi_step_form/wizard/filldata?post=' + 
                                $('#post_applied_for').find(":selected").text() + '&centre=' +
                                $('#centre').find(":selected").val();
                <?php } ?>
                
            }
        });
        
        
        <?php 
            if(!empty($this->Session->read('disabled_posts'))) {
                foreach ($this->Session->read('disabled_posts') as $value) {
                    echo "$(\"#post_applied_for option[text='" . $value .  "']\").remove();";
                    echo "$('#post_applied_for option').each(function() {\n
                        if ( $(this).text() == '" . $value . "' ) {\n
                            $(this).remove();\n
                        }\n
                    });\n";
                }
            }
         ?>
         

         $('#declaration').change(function(){
            if($(this).is(':checked')) {
                $('#continue_bt').prop('disabled', false);
            }
            else {
                $('#continue_bt').prop('disabled',true);
            }
        });

        /*var Select_List_Data = {
            'centre': { // name of associated select box
                // names match option values in controlling select box

                bas: {
                    text: ['None',
                           'Animal Sciences', 
                           'Biochemistry and Microbial Sciences', 
                           'Chemical Sciences', 
                           'Computational Sciences',
                           'Mathematics & Statistics',
                           'Pharmaceutical Sciences and Natural Products',
                           'Physical Sciences',
                           'Plant Sciences'
                          ],
                    value: ['none',
                            'Animal Sciences', 
                            'Biochemistry and Microbial Sciences', 
                            'Chemical Sciences', 
                            'Computational Sciences',
                            'Mathematics and Statistics',
                            'Pharmaceutical Sciences and Natural Products',
                            'Physical Sciences',
                            'Plant Sciences'
                           ]
                },
                edu: {
                    text: [ 'None',
                            'Education'
                          ],
                    value: ['none',
                            'Education'
                           ]
                },
                et: {
                    text: ['None',
                           'Agribusiness/Food Processing Technology', 
                           'Computer Science & Technology'
                          ],
                    value: ['none',
                            'Agribusiness or Food Processing Technology', 
                            'Computer Science and Technology'
                           ]
                },
                ees: {
                    text: ['None',
                           'Environmental Sciences & Technology', 
                           'Geography & Geology'
                          ],
                    value: ['none',
                            'Environmental Sciences and Technology', 
                            'Geography & Geology'
                           ]
                },
                gr: {
                    text: ['None',
                           'South & Central Asian Studies (Including Historical Studies)'
                          ],
                    value: ['none',
                            'South and Central Asian Studies (Including Historical Studies)'
                           ]
                },
                hs: {
                    text: ['None',
                           'Human Genetics and Molecular Medicine'
                          ],
                    value: ['none',
                            'Human Genetics and Molecular Medicine'
                           ]
                },
                llc: {
                    text: ['None',
                           'Classical and Modern Languages (Punjabi Languages, Literature and Culture, English)', 
                           'Comparative Literature'
                          ],
                    value: ['none',
                            'Classical and Modern Languages (Punjabi Languages, Literature and Culture, English)', 
                            'Comparative Literature'
                           ]
                },
                lsg: {
                    text: ['None',
                           'Law'
                          ],
                    value: ['none',
                            'Law'
                           ]
                },
                ss: {
                    text: ['None',
                           'Economic Studies', 
                           'Sociology'
                          ],
                    value: ['none',
                            'Economic Studies',
                            'Sociology'
                           ]
                },
                sps: {
                    text: ['None',
                           'Sports Sciences'
                          ],
                    value: ['none',
                            'Sports Sciences'
                           ]
                },
                bsr: {
                    text: ['None',
                           'Baba Satguru Ram Singh Chair'
                          ],
                    value: ['none',
                            'Baba Satguru Ram Singh Chair'
                           ]
                },
                none: {
                    text: ['None'],
                    value: ['none']
                }
            }    
        };


        // anonymous function assigned to onchange event of controlling select box
        $('#area').on("change", function(e) {
            // name of associated select box
            var relName = 'centre';

            // reference to associated select box 
            //var relList = this.form.elements[ relName ];

            // get data from object literal based on selection in controlling select box (this.value)
            var obj = Select_List_Data[ relName ][ $(this).val() ];

            //remove current option elements
            //removeAllOptions(relList, true);
            $('#centre')
                .find('option')
                .remove()
                .end();
                //.append('<option value="whatever">text</option>')
                //.val('whatever');


            // call function to add optgroup/option elements
            // pass reference to associated select box and data for new options
            //appendDataToSelect(relList, obj);
            $.each(obj.text, function (index, value) {
                $('#centre').append($('<option/>', { 
                    value: obj.value[index],
                    text : value 
                }));
            });
        });


        // populate associated select box as page loads
        (function() { // immediate function to avoid globals

            var form = document.forms['demoForm'];

            // reference to controlling select box
            var sel = $('#area');
            sel.selectedIndex = 0;

            // name of associated select box
            var relName = 'centre';
            // reference to associated select box
            //var rel = form.elements[ relName ];
            var rel = $('#centre');

            // get data for associated select box passing its name
            // and value of selected in controlling select box
            var data = Select_List_Data[ relName ][ sel.val() ];

            // add options to associated select box
            //appendDataToSelect(rel, data);
            $.each(data.text, function (index, value) {
                $('#centre').append($('<option/>', { 
                    value: data.value[index],
                    text : value 
                }));
            });

        }());*/
    });
</script>

<!--
<div id="elig_content">
        <div id="professor_science" style="display:none;">
            <ol type="i">Minimum Qualifications:
                <li>An eminent scholar with Ph.D. qualification(s) in the concerned/allied/relevant discipline
                and published work of high quality actively engaged in research with evidence of
                published work with a minimum of 10 publications as books and/or research/policy
                papers.</li>
                <li>A minimum of ten years of teaching experience in university/college, and/or experience
                in research at the University/National level institutions/industries, including experience
                of guiding candidates for research at doctoral level.</li>
                <li>Contribution to educational innovation, design of new curricula and courses, and
                technology –mediated teaching learning process.</li>
                <li>A minimum score as stipulated in the Academic Performance Indicator (API) based
                Performance Based Appraisal System (PBAS).</li>
            </ol>
            <br />Or
            <br />
            <ol>
                <li>
                An outstanding professional, with an exceptional accomplishment established reputation
                in the relevant field, who has made significant contributions to the knowledge in the
                concerned/allied/relevant discipline, to be substantiated by credentials
                </li>
            </ol>
        </div>
        <div id="professor_humanities" style="display:none;">
        <ol type="i">Minimum Qualifications:
                <li>An eminent scholar with Ph.D. qualification(s) in the concerned/allied/relevant discipline
                and published work of high quality actively engaged in research with evidence of
                published work with a minimum of 10 publications as books and/or research/policy
                papers.</li>
                <li>A minimum of ten years of teaching experience in university/college, and/or experience
                in research at the University/National level institutions/industries, including experience
                of guiding candidates for research at doctoral level.</li>
                <li>Contribution to educational innovation, design of new curricula and courses, and
                technology –mediated teaching learning process.</li>
                <li>A minimum score as stipulated in the Academic Performance Indicator (API) based
                Performance Based Appraisal System (PBAS).</li>
            </ol>
            <br />Or
            <br />
            <ol>
                <li>
                An outstanding professional, with an exceptional accomplishment established reputation
                in the relevant field, who has made significant contributions to the knowledge in the
                concerned/allied/relevant discipline, to be substantiated by credentials
                </li>
            </ol>
        </div>
        <div id="associateprofessor_science" style="display:none;">
            <ol type="i">Minimum Qualifications:
                <li>Good academic record with a Ph.D. Degree in the concerned/allied/relevant
				disciplines.</li>
                <li>A Master’s Degree with at least 55% marks (or an equivalent grade in a point scale wherever grading system
				is followed).</li>
                <li>A minimum of eight years of experience of teaching and/or research in an academic/research position
				equivalent to that of Assistant Professor in a University, College or Accredited Research Institution/industry
				excluding the period of Ph.D. research with evidence of published work and a minimum of 5 publications as
				books and/or research/policy papers.</li>
                <li>Contribution to educational innovation, design of new curricula and courses, and technology – mediated
				teaching learning process with evidence of having guided doctoral candidates and research students. </li>
				<li>A minimum score as stipulated in the Academic Performance Indicator (API) based Performance Based
				Appraisal System (PBAS), set out in UGC Regulations for appointment of teachers and other academic staff in
				universities and colleges and measures for the maintenance of standards in higher education, 2010
				(Appendix B).</li>
            </ol>
        </div>
        <div id="associateprofessor_humanities" style="display:none;">        
        <ol type="i">Minimum Qualifications:
                <li>Good academic record with a Ph.D. Degree in the concerned/allied/relevant
				disciplines.</li>
                <li>A Master’s Degree with at least 55% marks (or an equivalent grade in a point scale wherever grading system
				is followed).</li>
                <li>A minimum of eight years of experience of teaching and/or research in an academic/research position
				equivalent to that of Assistant Professor in a University, College or Accredited Research Institution/industry
				excluding the period of Ph.D. research with evidence of published work and a minimum of 5 publications as
				books and/or research/policy papers.</li>
                <li>Contribution to educational innovation, design of new curricula and courses, and technology – mediated
				teaching learning process with evidence of having guided doctoral candidates and research students. </li>
				<li>A minimum score as stipulated in the Academic Performance Indicator (API) based Performance Based
				Appraisal System (PBAS), set out in UGC Regulations for appointment of teachers and other academic staff in
				universities and colleges and measures for the maintenance of standards in higher education, 2010
				(Appendix B).</li>
            </ol>
        </div>
        <div id="assistantprofessor_science" style="display:none;">
            <ol type="i">Minimum Qualifications:
                <li>Good academic record as defined by the concerned university with at least 55%
				marks (or an equivalent grade in a point scale wherever grading system is followed)
				at the Master’s Degree level in a relevant subject from an Indian University, or an
				equivalent degree from an accredited foreign university.</li>
                <li>Besides fulfilling the above qualifications, the candidate must have cleared the
				National Eligibility Test (NET) conducted by the UGC, CSIR or similar test accredited
				by the UGC like SLET/SET. </li>
                <li>Notwithstanding anything contained in sub-clauses (i) and (ii) to this Clause 4.4.1,
				candidates, who are, or have been awarded a Ph. D. Degree in accordance with the
				University Grants Commission (Minimum Standards and Procedure for Award of
				Ph.D. Degree) Regulations, 2009, shall be exempted from the requirement of the
				minimum eligibility condition of NET/SLET/SET for recruitment and appointment of
				Assistant Professor or equivalent positions in Universities/Colleges/Institutions.</li>
                <li>NET/SLET/SET shall also not be required for such Masters Programmes in
				disciplines for which NET/SLET/SET is not conducted.</li>
            </ol>
        </div>
        <div id="assistantprofessor_humanities" style="display:none;">
        <ol type="i">Minimum Qualifications:
                <li>Good academic record as defined by the concerned university with at least 55%
				marks (or an equivalent grade in a point scale wherever grading system is followed)
				at the Master’s Degree level in a relevant subject from an Indian University, or an
				equivalent degree from an accredited foreign university.</li>
                <li>Besides fulfilling the above qualifications, the candidate must have cleared the
				National Eligibility Test (NET) conducted by the UGC, CSIR or similar test accredited
				by the UGC like SLET/SET. </li>
                <li>Notwithstanding anything contained in sub-clauses (i) and (ii) to this Clause 4.4.1,
				candidates, who are, or have been awarded a Ph. D. Degree in accordance with the
				University Grants Commission (Minimum Standards and Procedure for Award of
				Ph.D. Degree) Regulations, 2009, shall be exempted from the requirement of the
				minimum eligibility condition of NET/SLET/SET for recruitment and appointment of
				Assistant Professor or equivalent positions in Universities/Colleges/Institutions.</li>
                <li>NET/SLET/SET shall also not be required for such Masters Programmes in
				disciplines for which NET/SLET/SET is not conducted.</li>
            </ol>
        </div>
    </div>
-->
