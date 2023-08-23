from django.db import models

# Create your models here.
class Movie(models.Model):
    title = models.CharField(max_length=100)
    year = models.IntegerField()
    genre = models.CharField(max_length=100)
    director = models.CharField(max_length=100)
    cast = models.CharField(max_length=100)
    rating = models.IntegerField()
    runtime = models.IntegerField()
    plot = models.CharField(max_length=100)
    poster = models.CharField(max_length=100)
    imdb_id = models.CharField(max_length=100)

    def __str__(self):
        return self.title
