$(function() {

    let article,splilttedArticle;
    if(typeof $('#content').html() != 'undefined'){
        article = $('#content').html();
        splittedArticle = article.split(" ");
    } else{
        article ="";
        splilttedArticle = "";
    }
    let english = /[A-Za-z0-9]/;
    if(english.test(article)){
        $('#content').css("left" , '0');
        $('#shadow').css("left" , '0');
        $('#content').css("text-align" , 'left');
        $('#shadow').css("text-align" , 'left');
    } else {
        $('#content').css("right" , '0');
        $('#shadow').css("right" , '0');
        $('#content').css("text-align" , 'right');
        $('#shadow').css("text-align" , 'right');
    }



    let highlightRunning,highlightPaused;
    wordCounter = 0;
    highlightCounter = 0;
    highlightOverCounter = 0;


    let selectedMethod = 'word';
    let selectedColor = 'red';
    let selectedSize = '12';
    let selectedwordSpeed = '200';
    let selectedhighlightSpeed = '200';
    // assign method and show relevant text speed
    $("#method").change(function(){
        // reset variables
        highlightRunning,highlightPaused = false;
        pause = true;
        wordCounter = 0;
        highlightCounter = 0;
        highlightOverCounter = 0;
        // reset article content
        $('#content').html(article);
        $('#shadow').html("");
        $('#content').css('opacity', '1');
        // reset loops
        if(typeof wordLoop !== 'undefined'){
            clearInterval(wordLoop);
        }
        if(typeof highlightLoop !== 'undefined'){
            clearInterval(highlightLoop);
        }
        if(typeof highlightOverLoop !== 'undefined'){
            clearInterval(highlightOverLoop);
        }


        selectedMethod = $(this).children("option:selected").val();
        if (selectedMethod == "highlight" || selectedMethod == "highlightOver") {
            $('#wordFormGroup').hide();
            $('#highlightFormGroup').removeClass("d-none");
        } else {
            $('#highlightFormGroup').addClass("d-none");
            $('#wordFormGroup').show();
        }

        if(selectedMethod == "highlightOver"){
            $('#textColor').removeClass("d-none");
        } else {
            $('#textColor').addClass("d-none");
        }
    });

    //assign text color
    $("#color").change(function(){
        selectedColor = $(this).children("option:selected").val();
        if(typeof highlightOverLoop !== 'undefined'){
            clearInterval(highlightOverLoop);
        }
        $('#shadow').html("");
        highlightOverCounter = 0;
        pause = true;
    });
    // assign text size
    $("#textSize").change(function(){
        selectedSize = $(this).children("option:selected").val();
        $('#content').css('font-size', selectedSize);
        $('#shadow').css('font-size', selectedSize);
    });
    //assign words showing speed
    $("#wordSpeed").change(function(){
        selectedwordSpeed = $(this).children("option:selected").val();
    });
    //assign text highlighting speed
    $("#highlightSpeed").change(function(){
        selectedhighlightSpeed = $(this).children("option:selected").val();
    });

//////////////////////////////////////////////////////////



        let pause = true;
        $("#text").click(function(){
            if(pause==true){
                // START when clicking on text
                pause = false;
                if(selectedMethod=='word'){
                    $('#content').html("");
                    $('#shadow').html("");
                    wordLoop = setInterval(function(){
                    if(wordCounter < splittedArticle.length){
                    document.getElementById("content").innerHTML = splittedArticle[wordCounter];
                    }
                    wordCounter++
                },selectedwordSpeed);

                }else if(selectedMethod=='highlight'){
                    highlightRunning = true;
                    if(!highlightPaused && $('#content').html() != ""){
                        $('#content').html("");
                    }

                    if(english.test(article)){
                    highlightLoop = setInterval(function(){
                        if(highlightCounter< article.length){
                            $('#content').html($('#content').html() + article[highlightCounter]);
                        }
                        highlightCounter++
                    },selectedhighlightSpeed);
                } else{
                    highlightLoop = setInterval(function(){
                        if(highlightCounter< article.length){
                            $('#content').html($('#content').html() + " " + splittedArticle[highlightCounter]);
                        }
                        highlightCounter++
                    },selectedhighlightSpeed);
                }

                } else if(selectedMethod=='highlightOver'){
                    $('#content').html(article);
                    $('#content').css('opacity', '0.5');
                    if(english.test(article)){
                    highlightOverLoop = setInterval(function(){
                        if(highlightOverCounter< article.length){
                            $('#shadow').html(
                                $('#shadow').html() +
                                '<span style="color:'+selectedColor+';">' +
                                article[highlightOverCounter]+'</span>'
                             );
                        }
                        highlightOverCounter++
                    },selectedhighlightSpeed);
                }else{
                    highlightOverLoop = setInterval(function(){
                        if(highlightOverCounter< splittedArticle.length){
                            $('#shadow').html(
                                $('#shadow').html() +
                                '<span style="color:'+selectedColor+';">' + " " +
                                splittedArticle[highlightOverCounter]+'</span>'
                             );
                        }
                        highlightOverCounter++
                    },selectedhighlightSpeed);
                }
                }
            } else{
                // PAUSE when clicking on text
                pause = true;
                if(selectedMethod=='word'){
                    if(typeof wordLoop !== 'undefined'){
                        clearInterval(wordLoop);
                    }
                }else if(selectedMethod=='highlight'){
                    if(highlightRunning){
                        highlightPaused = true;
                    }
                    if(typeof highlightLoop !== 'undefined'){
                        clearInterval(highlightLoop);
                    }
                } else if(selectedMethod=='highlightOver'){
                    if(typeof highlightOverLoop !== 'undefined'){
                        clearInterval(highlightOverLoop);
                    }
                }
            }
        });



    // RESET BUTTON
    $("#reset").click(function(){
        $('#content').css('opacity', '1');
            pause = true;
            highlightRunning = false;
            highlightPaused = false;
            $('#shadow').html("");
            $('#content').html(article);
            wordCounter = 0;
            highlightCounter = 0;
            highlightOverCounter = 0;
            if(typeof wordLoop !== 'undefined'){
                clearInterval(wordLoop);
            }
            if(typeof highlightLoop !== 'undefined'){
                clearInterval(highlightLoop);
            }
            if(typeof highlightOverLoop !== 'undefined'){
                clearInterval(highlightOverLoop);
            }
    });





    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('#save').click(function(){
        $.ajax({
            type: 'POST',
            url: '../addBookmark/'+articleObj!='undefined' ? articleObj : "",
            data: {_token: CSRF_TOKEN, bookMark: wordCounter},
            success: function(response){
                alert(response);
            }
        });
    });
});
