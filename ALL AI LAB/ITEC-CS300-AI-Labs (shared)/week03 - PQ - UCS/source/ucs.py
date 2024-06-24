from collections import defaultdict

class Graph:
    # constructor
    def __init__(self):
        self.graph = defaultdict(list)
        self.numVertices = 0
        self.numEdges = 0

    # add an edge to graph
    def addEdge(self, u, v, w):
        self.graph[u].append((w, v))
        
    # read edges from file
    def readEdgesFromFile(self, filename):
        with open(filename) as f:
            for line in f:
                u, v, w = [int(it) for it in line.strip().split(' ')]
                self.addEdge(u, v, w)
                self.numEdges += 1
        self.numVertices = max(self.graph.keys()) + 1
    
    # print list of edges incident on each vertex
    def printGraph(self):
        print('#vertices:', self.numVertices)
        print('#edges:', self.numEdges)
        for u in self.graph:
            print(u, self.graph[u])
    
    # UCS algorithm
    def UCS(self, s=0):
        '''
        TODO:
        - implement UCS algorithm, source s=0, goal g=vertex-with-largest-id
        - return the total cost of the shortest path from s to g
        - return -1 if g is unreachable from s
        '''
        return -1

if __name__ == '__main__':
    g = Graph()
    g.readEdgesFromFile('input/input01.txt')
    g.printGraph()