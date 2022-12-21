import tkinter
import pyglet
pyglet.options['search_local_libs'] = True

ventana = tkinter.Tk()
ventana.title("Reproductor de video")
ventana.geometry("400x300")

etiqueta = tkinter.Label(ventana, text= "Hola Mundo")
etiqueta.pack()

def play_video(file_name):
    video = pyglet.media.load(file_name)
    player = pyglet.media.Player()
    player.queue(video)
    player.play()

play_button = tkinter.Button(ventana, text="Reproducir", command=lambda: play_video("video.mp4"))
play_button.pack()

ventana.mainloop()