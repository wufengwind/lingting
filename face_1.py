from PIL import Image
import face_recognition
import sys
def face(a):
	image = face_recognition.load_image_file(a)
	face_locations = face_recognition.face_locations(image)
	print(format(len(face_locations)))
b=sys.argv[1]
face(b)

