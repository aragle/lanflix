from django.http import HttpResponse
from django.shortcuts import render

def homepage(request):
    return render(request, 'homepage.html')

def about(resuest):
    # return HttpResponse("about")
    return render(request, 'about.html')
