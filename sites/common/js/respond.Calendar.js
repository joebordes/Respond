/*
	Creates the calendar for Respond CMS
*/
var respond = respond || {};

respond.Calendar = function(config){
	
	this.el = config.el;
	this.weeks = config.weeks;
	
	var d = new Date();
	var m_d = moment(d).startOf('day');
	
	var month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	var days = ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'];
	var days_f = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	
	var container = '<div class="respond-calendar-container">';
	
	var day = d.getDay();
	
	container += '<div class="header"><span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span></div>';
	
	container += '<div class="week">';
	var start = 0;
	
	var pastDate = true;
	var cssClass = '';

	for(x=start; x<(7*this.weeks)+day+1; x++){
		var offset = x - day;
		
		var curr_date = new Date();
		curr_date.setDate(d.getDate()+offset);
		curr_date.setHours(0);
		curr_date.setMinutes(0);
		curr_date.setSeconds(0);
		curr_date.setMilliseconds(0);
		var curr_day = curr_date.getDay();
		
		var m = moment(curr_date).startOf('day');
        
        var diff = m.diff(m_d, 'days');
        
		if(diff >= 0){
			cssClass = ' active';
		}
		
		if(diff == 0){
			cssClass += ' today';
		}
        
		if(offset==0){
			container += '<span class="day'+cssClass+'" data-date="'+m.format('YYYY-MM-DD')+'">';
			pastDate = true;
		}
		else{
			container += '<span class="day'+cssClass+'" data-date="'+m.format('YYYY-MM-DD')+'">';
		}
		
		container += '<span class="day-number">'+curr_date.getDate() + '</span>';
		
		container += '</span>';
		
		if((x+1)%7==0){
			container+='</div><div class="week">';
		}
	
    }

    container += '</div></div>';


    $(this.el).html(container);
    
}

// adds an event to a calendar, el is a DOM reference to the calendar
respond.Calendar.AddEvent = function(el, name, description, url, beginDate, endDate){

	// create begin and end from moment
	var m_begin = moment(beginDate, "YYYY-MM-DD HH:mm:ss");
	var m_end = moment(endDate, "YYYY-MM-DD HH:mm:ss");
	
	var time = m_begin.format('h:mm a') + ' - ' + m_end.format('h:mm a')

	var event = '<div class="event">' +
					'<h4><a href="' + url + '">' + name + '</a></h4>' +
					'<h5>' + time + '</h5>' +
				//	'<p>' + description + '</p>' +
				'</div>';
				
	
	var els = $(el).find('[data-date='+m_begin.format('YYYY-MM-DD')+']');
	
	if(els.length > 0){
		$(els[0]).append(event);
	}				

	
}

