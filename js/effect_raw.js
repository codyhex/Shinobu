// Slimbox2
(function(w){var E=w(window),u,f,F=-1,n,x,D,v,y,L,r,m=!window.XMLHttpRequest,s=[],l=document.documentElement,k={},t=new Image(),J=new Image(),H,a,g,p,I,d,G,c,A,K;w(function(){w("body").append(w([H=w('<div id="lbOverlay" />')[0],a=w('<div id="lbCenter" />')[0],G=w('<div id="lbBottomContainer" />')[0]]).css("display","none"));g=w('<div id="lbImage" />').appendTo(a).append(p=w('<div style="position: relative;" />').append([I=w('<a id="lbPrevLink" href="#" />').click(B)[0],d=w('<a id="lbNextLink" href="#" />').click(e)[0]])[0])[0];c=w('<div id="lbBottom" />').appendTo(G).append([w('<a id="lbCloseLink" href="#" />').add(H).click(C)[0],A=w('<div id="lbCaption" />')[0],K=w('<div id="lbNumber" />')[0],w('<div style="clear: both;" />')[0]])[0]});w.slimbox=function(O,N,M){u=w.extend({loop:false,overlayOpacity:0.8,overlayFadeDuration:400,resizeDuration:400,resizeEasing:"swing",initialWidth:250,initialHeight:250,imageFadeDuration:400,captionAnimationDuration:400,counterText:"Image {x} of {y}",closeKeys:[27,88,67],previousKeys:[37,80],nextKeys:[39,78]},M);if(typeof O=="string"){O=[[O,N]];N=0}y=E.scrollTop()+(E.height()/2);L=u.initialWidth;r=u.initialHeight;w(a).css({top:Math.max(0,y-(r/2)),width:L,height:r,marginLeft:-L/2}).show();v=m||(H.currentStyle&&(H.currentStyle.position!="fixed"));if(v){H.style.position="absolute"}w(H).css("opacity",u.overlayOpacity).fadeIn(u.overlayFadeDuration);z();j(1);f=O;u.loop=u.loop&&(f.length>1);return b(N)};w.fn.slimbox=function(M,P,O){P=P||function(Q){return[Q.href,Q.title]};O=O||function(){return true};var N=this;return N.unbind("click").click(function(){var S=this,U=0,T,Q=0,R;T=w.grep(N,function(W,V){return O.call(S,W,V)});for(R=T.length;Q<R;++Q){if(T[Q]==S){U=Q}T[Q]=P(T[Q],Q)}return w.slimbox(T,U,M)})};function z(){var N=E.scrollLeft(),M=E.width();w([a,G]).css("left",N+(M/2));if(v){w(H).css({left:N,top:E.scrollTop(),width:M,height:E.height()})}}function j(M){if(M){w("object").add(m?"select":"embed").each(function(O,P){s[O]=[P,P.style.visibility];P.style.visibility="hidden"})}else{w.each(s,function(O,P){P[0].style.visibility=P[1]});s=[]}var N=M?"bind":"unbind";E[N]("scroll resize",z);w(document)[N]("keydown",o)}function o(O){var N=O.keyCode,M=w.inArray;return(M(N,u.closeKeys)>=0)?C():(M(N,u.nextKeys)>=0)?e():(M(N,u.previousKeys)>=0)?B():false}function B(){return b(x)}function e(){return b(D)}function b(M){if(M>=0){F=M;n=f[F][0];x=(F||(u.loop?f.length:0))-1;D=((F+1)%f.length)||(u.loop?0:-1);q();a.className="lbLoading";k=new Image();k.onload=i;k.src=n}return false}function i(){a.className="";w(g).css({backgroundImage:"url("+n+")",visibility:"hidden",display:""});w(p).width(k.width);w([p,I,d]).height(k.height);w(A).html(f[F][1]||"");w(K).html((((f.length>1)&&u.counterText)||"").replace(/{x}/,F+1).replace(/{y}/,f.length));if(x>=0){t.src=f[x][0]}if(D>=0){J.src=f[D][0]}L=g.offsetWidth;r=g.offsetHeight;var M=Math.max(0,y-(r/2));if(a.offsetHeight!=r){w(a).animate({height:r,top:M},u.resizeDuration,u.resizeEasing)}if(a.offsetWidth!=L){w(a).animate({width:L,marginLeft:-L/2},u.resizeDuration,u.resizeEasing)}w(a).queue(function(){w(G).css({width:L,top:M+r,marginLeft:-L/2,visibility:"hidden",display:""});w(g).css({display:"none",visibility:"",opacity:""}).fadeIn(u.imageFadeDuration,h)})}function h(){if(x>=0){w(I).show()}if(D>=0){w(d).show()}w(c).css("marginTop",-c.offsetHeight).animate({marginTop:0},u.captionAnimationDuration);G.style.visibility=""}function q(){k.onload=null;k.src=t.src=J.src=n;w([a,g,c]).stop(true);w([I,d,g,G]).hide()}function C(){if(F>=0){q();F=x=D=-1;w(a).hide();w(H).stop().fadeOut(u.overlayFadeDuration,j)}return false}})(jQuery);
// emptyInput
(function($){$.fn.emptyInput=function(options){return this.each(function(){var currentField=$(this);currentField.methods={startingValue:currentField.val(),resetValue:function(){var currentValue=currentField.val();if(currentField.methods.startingValue==currentValue)currentField.val('')},restoreValue:function(){var currentValue=currentField.val();if(currentValue=='')currentField.val(currentField.methods.startingValue)}};currentField.bind('focus',currentField.methods.resetValue);currentField.bind('blur',currentField.methods.restoreValue)})}})(jQuery);
// Effects and Settings
jQuery(document).ready(function($){
	// Slimbox2 Setting
	$(".content a:has(img)").slimbox();
	// emptyInput Setting
	if(jQuery.fn.emptyInput)
	jQuery('#searchform input:text').emptyInput();
	// 宽度控制
	var total_width = $('.post').length * 200 + 600;
	$('.postlist').css('width', total_width + 'px');
	// 显、隐
	$('.post').hover(function(){
		$(this).children(".technology").css("background-position", '-90px -56px');
		$(this).children(".project").css("background-position", '-150px -56px');
		$(this).children(".wiki").css("background-position", '-120px -56px');
		$(this).children(".info").fadeIn();
		$(this).children(".dark").fadeOut();
	},function(){
		$(this).children(".technology").css("background-position", '-90px 0px');
		$(this).children(".project").css("background-position", '-150px 0px');
		$(this).children(".wiki").css("background-position", '-120px 0px');
		$(this).children(".info").fadeOut();
		$(this).children(".dark").fadeIn();
	});
	$('.page').hover(function(){
		$(this).children(".dark").fadeOut();
	},function(){
		$(this).children(".dark").fadeIn();
	});
	//  文章简讯显、隐
	$(".info").hover(function(){
		$(this).siblings(".dark").fadeIn();
		$(this).siblings(".entry").fadeIn();
	}).parent(".post").mouseleave(function(){
		$(this).children(".entry").fadeOut();
	});
	//
	$("#tools").click(function() {
      var classBouton = $("#tools").attr("class");
      
      if (classBouton == 'status1'){
        $(this).addClass('status2').removeClass('status1');
        $('#description').animate({left: 0}, 300);
        $('#menu').animate({left: 400}, 300);
      } else {
        $(this).addClass('status1').removeClass('status2');
        $('#description').animate({left: -400}, 300);
        $('#menu').animate({left: 0}, 300);
      }
    });
	//
	$('#search_btn').toggle(function(){
		$('#search').animate({top: 0}, 300);
	},function(){
		$('#search').animate({top: -35}, 300);
	});
});
// comment registration
jQuery(function(){$('#author').focus(function(){if($(this).val()=='Name :'){$(this).val('')}}).blur(function(){if($(this).val()==''){$(this).val('Name :')}})});jQuery(function(){$('#email').focus(function(){if($(this).val()=='Email :'){$(this).val('')}}).blur(function(){if($(this).val()==''){$(this).val('Email :')}})});jQuery(function(){$('#url').focus(function(){if($(this).val()=='Website :'){$(this).val('')}}).blur(function(){if($(this).val()==''){$(this).val('Website :')}})});
// smiley
function grin(tag){var myField;tag=' '+tag+' ';if(document.getElementById('comment')&&document.getElementById('comment').type=='textarea'){myField=document.getElementById('comment')}else{return false}if(document.selection){myField.focus();sel=document.selection.createRange();sel.text=tag;myField.focus()}else if(myField.selectionStart||myField.selectionStart=='0'){var startPos=myField.selectionStart;var endPos=myField.selectionEnd;var cursorPos=endPos;myField.value=myField.value.substring(0,startPos)+tag+myField.value.substring(endPos,myField.value.length);cursorPos+=tag.length;myField.focus();myField.selectionStart=cursorPos;myField.selectionEnd=cursorPos}else{myField.value+=tag;myField.focus()}}