import glob

from ucs import Graph

inputs = glob.glob('input/*.txt')
inputs.sort()

count = 0
for it in inputs:
    try:
        g = Graph()
        g.readEdgesFromFile(it)
        output = g.UCS(0)
        
        ans = int(open(it.replace('input', 'answer')).read())
        count += output == ans
    except:
        print('failed:', it)

print('score:', int(count/len(inputs)*10))      