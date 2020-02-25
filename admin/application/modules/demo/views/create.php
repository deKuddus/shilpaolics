<div class="ibox ">
    <div class="ibox-title">
        <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#" class="dropdown-item">Config option 1</a>
                </li>
                <li><a href="#" class="dropdown-item">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <form method="get">
            <div class="form-group  row"><label class="col-sm-2 col-form-label">Normal</label>

                <div class="col-sm-10"><input type="text" class="form-control"></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label">Help text</label>
                <div class="col-sm-10"><input type="text" class="form-control"> <span class="form-text m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label">Password</label>

                <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label">Placeholder</label>

                <div class="col-sm-10"><input type="text" placeholder="placeholder" class="form-control"></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label">Checkboxes &amp; radios <br/><small class="text-navy">Custom elements</small></label>

                <div class="col-sm-10">
                    <div class="i-checks"><label> <input type="checkbox" value=""> <i></i> Option one </label></div>
                    <div class="i-checks"><label> <input type="checkbox" value="" checked=""> <i></i> Option two checked </label></div>
                    <div class="i-checks"><label> <input type="checkbox" value="" disabled="" checked=""> <i></i> Option three checked and disabled </label></div>
                    <div class="i-checks"><label> <input type="checkbox" value="" disabled=""> <i></i> Option four disabled </label></div>
                    <div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Option one </label></div>
                    <div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Option two checked </label></div>
                    <div class="i-checks"><label> <input type="radio" disabled="" checked="" value="option2"> <i></i> Option three checked and disabled </label></div>
                    <div class="i-checks"><label> <input type="radio" disabled="" name="a"> <i></i> Option four disabled </label></div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label">Inline checkboxes</label>

                <div class="col-sm-10"><label class="checkbox-inline i-checks"> <input type="checkbox" value="option1">a </label>
                    <label class="i-checks"> <input type="checkbox" value="option2"> b </label>
                    <label class="i-checks"> <input type="checkbox" value="option3"> c </label></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label class="col-sm-2 col-form-label">Control sizing</label>

                    <div class="col-sm-10"><input type="text" placeholder=".form-control-lg" class="form-control form-control-lg m-b">
                        <input type="text" placeholder="Default input" class="form-control m-b"> <input type="text" placeholder=".form-control-sm" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group row"><label class="col-sm-2 col-form-label">Column sizing</label>

                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-md-2"><input type="text" placeholder=".col-md-2" class="form-control"></div>
                            <div class="col-md-3"><input type="text" placeholder=".col-md-3" class="form-control"></div>
                            <div class="col-md-4"><input type="text" placeholder=".col-md-4" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="font-normal">Single Select</label>
                    <div>
                        <select data-placeholder="Choose a Country..." class="chosen-select"  tabindex="2">
                            <option value="">Select</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Aland Islands">Aland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                        </select>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="font-normal">Multiple Select</label>
                    <div>
                        <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                            <option value="">Select</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Aland Islands">Aland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                        </select>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group" id="data_1">
                    <label class="font-normal">Simple date input format</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group" id="data_5">
                    <label class="font-normal">Range select</label>
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" class="form-control-sm form-control" name="start" value="05/14/2014"/>
                        <span class="input-group-addon">to</span>
                        <input type="text" class="form-control-sm form-control" name="end" value="05/22/2014" />
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="font-normal">User/Customer Image</label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                        <span class="fileinput-filename"></span>
                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="ibox-content">
                        <label class="font-normal">Color Picker</label>
                        <input type="text" class="form-control demo1" value="#5367ce" />
                    </div>
                </div>
                <p>
                    Are perfect for range select option.
                </p>
                <div class="m-b-sm">
                    <small ><strong>Example of:</strong> Set diapason from 0 to 5000, Adding postfix "+" to max value, Set slider type to double, Dollar symbol as prefix, Enable grid  </small>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>