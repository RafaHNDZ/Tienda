<!-- FOOTER -->
<!--
<footer>
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>
-->
<!-- Modal Login-->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="#" id="form_login" name="form_login" class="form-horizontal">
              <input type="hidden" value="" name="id"/>
              <div class="form-body">
                  <div class="form-group">
                      <label class="control-label col-md-3">E-Mail</label>
                      <div class="col-md-9">
                          <input name="email" placeholder="E-Mail" class="form-control" type="email">
                          <span class="help-block"></span>
                      </div>
                        </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Contraseña</label>
                      <div class="col-md-9">
                       <input name="pass" placeholder="Contraseña" class="form-control" type="password">
                       <span class="help-block"></span>
                      </div>
                        </div>
              </div>
          </form>
      </div>
      <div class="modal-footer">
            <button type="button" id="btnLogin" onclick="login()" class="btn btn-primary">Entrar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Registro-->
<div class="modal fade bd-example-modal-lg" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--
                <nav class="nav nav-tabs" id="myTab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-expanded="true">EULA</a>
                    <a class="nav-item nav-link" id="nav-profile-tab">Form</a>
                </nav>
                -->
                <br>
                <div class="tab-content" id="nav-tabContent">
                    <!-- LOGIN CONTENT -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="col-xs-12 col-md-12" id="inner-content-div">
                            <ul>
                                <li><strong><span style="color: #000000;">Acceptance Of This Agreement  </span></strong><span style="color: #000000;">Your access to and use of this website (&#8220;the Website&#8221;) is subject exclusively to these Terms and Conditions. You will not use the Website for any purpose that is unlawful or prohibited by these Terms and Conditions. By using the Website you are fully accepting the terms, conditions and disclaimers contained in this notice. If you do not accept these Terms and Conditions you must immediately stop using the Website.</span></li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Advice  </strong>The contents of the Website do not constitute advice and should not be relied upon in making or refraining from making, any decision. StoryGuide, its writers, presenters, hosts, teachers, staff, management and affiliates take no responsibility for decisions made in reliance on information contained herein.</li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Changes to Website, Software, and Services  </strong>StoryGuide reserves the right to:
                                    <ol>
                                        <li>change or remove (temporarily or permanently) the Website or any part of it without notice and you confirm that StoryGuide shall not be liable to you for any such change or removal.</li>
                                        <li>change, remove, or discontinue any software, service, or promotion (including but not limited to any previsions, parts thereof, licensing, pricing) as advertised on this website at any time without notice and you confirm that StoryGuide shall not be liable for any such change or removal.</li>
                                        <li>change or discontinue any relevant promotional discount vouchers or coupon codes at anytime with notice and you confirm that StoryGuide shall not be liable for any such change or removal.</li>
                                        <li>change this Agreement at any time, and your continued use of the Website following any changes shall be deemed to be your acceptance of such change.</li>
                                    </ol>
                                </li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Links to Third Party Websites  </strong>The Website may include links to third party website&#8217;s that are controlled and maintained by others. Any link to other website&#8217;s is not an endorsement of such website&#8217;s and you acknowledge and agree that we are not responsible for the content or availability of any such sites.</li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Copyright  </strong>The Intellectual Property Rights in this website and the materials on or accessible via it belong to StoryGuide or its licensors. This website and the materials on or accessible via it and the Intellectual Property Rights therein may not be copied, distributed, published, licensed, used or reproduced in any way (save to the extent strictly necessary for, and for the purposes of, accessing and using this website).StoryGuide and the StoryGuide Logo are trade marks which belong to StoryGuide and they may not be may not be used, copied or reproduced in any way without written consent from StoryGuide.For these purposes <strong>&#8220;Intellectual Property Rights&#8221;</strong> includes the following (wherever and when ever arising and for the full term of each of them): any patent, trade mark, trade name, service mark, service name, design, design right, copyright, database right, moral rights, know how, trade secret and other confidential information, rights in the nature of any of these items in any country, rights in the nature of unfair competition rights and rights to sue for passing off or other similar intellectual or commercial right (in each case whether or not registered or registrable) and registrations of and applications to register any of them.</li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Limitation Of Liability  </strong>The Website is provided on an &#8220;AS IS&#8221; and &#8220;AS AVAILABLE&#8221; basis without any representation or endorsement made and without warranty of any kind whether express or implied, including but not limited to the implied warranties of satisfactory quality, fitness for a particular purpose, non-infringement, compatibility, security and accuracy.To the extent permitted by law, StoryGuide will not be liable for any indirect or consequential loss or damage whatever (including without limitation loss of business, opportunity, data, profits) arising out of or in connection with the use of the Website.StoryGuide makes no warranty that the functionality of the Website will be uninterrupted or error free, that defects will be corrected or that the Website or the server that makes it available are free of viruses or anything else which may be harmful or destructive.Nothing in these Terms and Conditions shall be construed so as to exclude or limit the liability of StoryGuide for personal injury as a result of the negligence of StoryGuide or that of its employees or agents.</li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Indemnity  </strong>You agree to indemnify and hold StoryGuide and its employees and agents harmless from and against all liabilities, legal fees, damages, losses, costs and other expenses in relation to any claims or actions brought against StoryGuide arising out of any breach by you of these Terms and Conditions or other liabilities arising out of your use of this Website.</li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Severability </strong>In the event that any provision of this Agreement is declared by any judicial or other competent authority to be void, voidable, illegal or otherwise unenforceable or indications of the same are received by either you or us from any relevant competent authority, we shall amend that provision in such reasonable manner as achieves the intention of the parties without illegality or, at our discretion, such provision may be severed from this Agreement and the remaining provisions of this Agreement shall remain in full force and effect. <strong> </strong></li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Applicable Law and Dispute  </strong>This Agreement and all matters arising from it are governed by and construed in accordance with the laws of the sovereign state of Washington in the United States of America whose federal courts shall have exclusive jurisdiction over all disputes arising in connection with this Agreement and the place of performance of this Agreement is agreed by you to be Washington. This choice of law provision supersedes any conflict of laws provision which may otherwise apply.</li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Headings  </strong>Headings are included in this Agreement for convenience only and shall not affect the construction or interpretation of this Agreement.</li>
                            </ul>
                            <p>&nbsp;</p>
                            <ul>
                                <li><strong>Entire Agreement  </strong>These terms and conditions together with any documents expressly referred to in them, contain the entire Agreement between us relating to the subject matter covered and supersede any previous Agreements, arrangements, undertakings or proposals, written or oral: between us in relation to such matters. No oral explanation or oral information given by any party shall alter the interpretation of these terms and conditions. In agreeing to these terms and conditions, you have not relied on any representation other than those expressly stated in these terms and conditions and you agree that you shall have no remedy in respect of any misrepresentation which has not been made expressly in this Agreement.</li>
                            </ul>
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile">Acepto</button>
                            </div>
                        </div>
                    </div>
                    <!-- REGISTRO CONTENT -->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form action="#" id="form" name="form" >
                            <input type="hidden" value="" name="id"/>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <!--
                                        <label class="control-label">Nombre</label>
                                        -->
                                        <div class="col-md-12">
                                            <input name="firstName" placeholder="Nombre" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <!--
                                        <label class="control-label">Apellidos</label>
                                        -->
                                        <div class="col-md-12">
                                            <input name="lastName" placeholder="Apellidos" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <!--
                                        <label class="control-label col-md-3">Telefono</label>
                                        -->
                                        <div class="col-md-12">
                                            <input name="telefono" placeholder="Telefono" class="form-control" type="tel">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <!--
                                        <label class="control-label col-md-3">E-Mail</label>
                                        -->
                                        <div class="col-md-12">
                                            <input name="email" placeholder="E-Mail" class="form-control" type="email">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Contraseña</label>
                                    <div class="col-md-9">
                                        <input name="password" placeholder="Contraseña" class="form-control" type="password">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Dirección</label>
                                    <div class="col-md-9">
                                        <textarea name="address" placeholder="Dirección" class="form-control"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Fecha de Nacimiento</label>
                                    <div class="col-md-9">
                                        <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="date">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-xs-12 col-md-2">
                            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Registrarme!</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No Acepto</button>
                    <button type="button" class="btn btn-primary" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile">Acepto</button>

                </div>
                -->
            </div>
        </div>
    </div>
</div>

<!--
<div class="modal fade bd-example-modal-lg" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-xs-12 col-md-12" id="inner-content-div">
                  <ul>
                      <li><strong><span style="color: #000000;">Acceptance Of This Agreement  </span></strong><span style="color: #000000;">Your access to and use of this website (&#8220;the Website&#8221;) is subject exclusively to these Terms and Conditions. You will not use the Website for any purpose that is unlawful or prohibited by these Terms and Conditions. By using the Website you are fully accepting the terms, conditions and disclaimers contained in this notice. If you do not accept these Terms and Conditions you must immediately stop using the Website.</span></li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Advice  </strong>The contents of the Website do not constitute advice and should not be relied upon in making or refraining from making, any decision. StoryGuide, its writers, presenters, hosts, teachers, staff, management and affiliates take no responsibility for decisions made in reliance on information contained herein.</li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Changes to Website, Software, and Services  </strong>StoryGuide reserves the right to:
                          <ol>
                              <li>change or remove (temporarily or permanently) the Website or any part of it without notice and you confirm that StoryGuide shall not be liable to you for any such change or removal.</li>
                              <li>change, remove, or discontinue any software, service, or promotion (including but not limited to any previsions, parts thereof, licensing, pricing) as advertised on this website at any time without notice and you confirm that StoryGuide shall not be liable for any such change or removal.</li>
                              <li>change or discontinue any relevant promotional discount vouchers or coupon codes at anytime with notice and you confirm that StoryGuide shall not be liable for any such change or removal.</li>
                              <li>change this Agreement at any time, and your continued use of the Website following any changes shall be deemed to be your acceptance of such change.</li>
                          </ol>
                      </li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Links to Third Party Websites  </strong>The Website may include links to third party website&#8217;s that are controlled and maintained by others. Any link to other website&#8217;s is not an endorsement of such website&#8217;s and you acknowledge and agree that we are not responsible for the content or availability of any such sites.</li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Copyright  </strong>The Intellectual Property Rights in this website and the materials on or accessible via it belong to StoryGuide or its licensors. This website and the materials on or accessible via it and the Intellectual Property Rights therein may not be copied, distributed, published, licensed, used or reproduced in any way (save to the extent strictly necessary for, and for the purposes of, accessing and using this website).StoryGuide and the StoryGuide Logo are trade marks which belong to StoryGuide and they may not be may not be used, copied or reproduced in any way without written consent from StoryGuide.For these purposes <strong>&#8220;Intellectual Property Rights&#8221;</strong> includes the following (wherever and when ever arising and for the full term of each of them): any patent, trade mark, trade name, service mark, service name, design, design right, copyright, database right, moral rights, know how, trade secret and other confidential information, rights in the nature of any of these items in any country, rights in the nature of unfair competition rights and rights to sue for passing off or other similar intellectual or commercial right (in each case whether or not registered or registrable) and registrations of and applications to register any of them.</li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Limitation Of Liability  </strong>The Website is provided on an &#8220;AS IS&#8221; and &#8220;AS AVAILABLE&#8221; basis without any representation or endorsement made and without warranty of any kind whether express or implied, including but not limited to the implied warranties of satisfactory quality, fitness for a particular purpose, non-infringement, compatibility, security and accuracy.To the extent permitted by law, StoryGuide will not be liable for any indirect or consequential loss or damage whatever (including without limitation loss of business, opportunity, data, profits) arising out of or in connection with the use of the Website.StoryGuide makes no warranty that the functionality of the Website will be uninterrupted or error free, that defects will be corrected or that the Website or the server that makes it available are free of viruses or anything else which may be harmful or destructive.Nothing in these Terms and Conditions shall be construed so as to exclude or limit the liability of StoryGuide for personal injury as a result of the negligence of StoryGuide or that of its employees or agents.</li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Indemnity  </strong>You agree to indemnify and hold StoryGuide and its employees and agents harmless from and against all liabilities, legal fees, damages, losses, costs and other expenses in relation to any claims or actions brought against StoryGuide arising out of any breach by you of these Terms and Conditions or other liabilities arising out of your use of this Website.</li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Severability </strong>In the event that any provision of this Agreement is declared by any judicial or other competent authority to be void, voidable, illegal or otherwise unenforceable or indications of the same are received by either you or us from any relevant competent authority, we shall amend that provision in such reasonable manner as achieves the intention of the parties without illegality or, at our discretion, such provision may be severed from this Agreement and the remaining provisions of this Agreement shall remain in full force and effect. <strong> </strong></li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Applicable Law and Dispute  </strong>This Agreement and all matters arising from it are governed by and construed in accordance with the laws of the sovereign state of Washington in the United States of America whose federal courts shall have exclusive jurisdiction over all disputes arising in connection with this Agreement and the place of performance of this Agreement is agreed by you to be Washington. This choice of law provision supersedes any conflict of laws provision which may otherwise apply.</li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Headings  </strong>Headings are included in this Agreement for convenience only and shall not affect the construction or interpretation of this Agreement.</li>
                  </ul>
                  <p>&nbsp;</p>
                  <ul>
                      <li><strong>Entire Agreement  </strong>These terms and conditions together with any documents expressly referred to in them, contain the entire Agreement between us relating to the subject matter covered and supersede any previous Agreements, arrangements, undertakings or proposals, written or oral: between us in relation to such matters. No oral explanation or oral information given by any party shall alter the interpretation of these terms and conditions. In agreeing to these terms and conditions, you have not relied on any representation other than those expressly stated in these terms and conditions and you agree that you shall have no remedy in respect of any misrepresentation which has not been made expressly in this Agreement.</li>
                  </ul>
              </div>

              <!--
                    <form action="#" id="form" name="form" class="form-horizontal">
                        <input type="hidden" value="" name="id"/>
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nombre</label>
                                <div class="col-md-9">
                                    <input name="firstName" placeholder="Nombre" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Apellidos</label>
                                <div class="col-md-9">
                                    <input name="lastName" placeholder="Apellidos" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Telefono</label>
                                <div class="col-md-9">
                                    <input name="telefono" placeholder="Telefono" class="form-control" type="tel">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">E-Mail</label>
                                <div class="col-md-9">
                                    <input name="email" placeholder="E-Mail" class="form-control" type="email">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Contraseña</label>
                                <div class="col-md-9">
                                    <input name="password" placeholder="Contraseña" class="form-control" type="password">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Dirección</label>
                                <div class="col-md-9">
                                    <textarea name="address" placeholder="Dirección" class="form-control"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Fecha de Nacimiento</label>
                                <div class="col-md-9">
                                    <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="date">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    -->
      </div>
<!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No Acepto</button>
        <button type="button" class="btn btn-primary">Acepto</button>
      </div>
      -->
    </div>
  </div>
</div>