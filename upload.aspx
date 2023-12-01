
<asp:FileUpload ID="file1" runat="server" AllowMultiple="true" /><br>
<input type="button" value="Upload File" onclick="UploadFile()" />

<progress id="progressBar" value="0" max="100" style="width: 300px;"></progress>
<h3 id="status"></h3>
<p id="loaded_n_total"></p>
